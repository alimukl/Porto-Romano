<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity;

    protected $fillable = [
        'name',
        'email',
        'job_position',
        'annual_leave_quota',
        'sick_leave_quota',
        'emergency_leave_quota',
        'maternity_leave_quota',
        'paternity_leave_quota',
        'unpaid_leave_quota',
        'start_date',
        'password',
        'profile_photo',
        'age',
        'passport_number',
        'employment_pass',
        'address',
        'phone',
        'mfa_token',
        'mfa_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'start_date' => 'date',
        ];
    }

    // Model lifecycle hooks to auto-calculate leave quota
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->annual_leave_quota = $user->calculateAnnualLeaveQuota();
        });

        static::updating(function ($user) {
            // Only auto-calculate quota if the annual_leave_quota is NOT being manually updated
            if (!$user->isDirty('annual_leave_quota')) {
                $user->annual_leave_quota = $user->calculateAnnualLeaveQuota();
            }
        });
        
    }

    // Encryption for sensitive fields
    public function setAttribute($key, $value)
    {
        $encryptedFields = ['address', 'employment_pass', 'passport_number','phone'];

        if (in_array($key, $encryptedFields) && !is_null($value)) {
            if (!str_starts_with($value, 'eyJpdiI6')) {
                $value = Crypt::encryptString($value);
            }
        }

        parent::setAttribute($key, $value);
    }

    // Decryption for display
    public function getAttribute($key)
    {
        $encryptedFields = ['address', 'employment_pass', 'passport_number','phone'];

        $value = parent::getAttribute($key);

        if (in_array($key, $encryptedFields) && !is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (\Exception $e) {
                return $value;
            }
        }

        return $value;
    }

    // Annual leave calculation based on start_date
    public function calculateAnnualLeaveQuota()
    {
        $start_date = Carbon::parse($this->start_date);

        // Ensure future start dates get 0 quota
        if ($start_date->isFuture()) {
            return 0;  // Future hires get 0 leave
        }

        // Calculate total **completed** months of service
        $months_of_service = $start_date->diffInMonths(now());

        // Determine the annual leave quota
        if ($months_of_service < 24) {
            return 8;  // Less than 2 years (0-23 months)
        } elseif ($months_of_service < 60) {  
            return 12; // Between 2 and 5 years (24-59 months)
        } else {
            return 16; // More than 5 years (60+ months)
        }
    }

    public function initializeLeaveQuota()
    {
        $this->sick_leave_quota = 14;
        $this->emergency_leave_quota = 5;
        $this->maternity_leave_quota = 60;
        $this->paternity_leave_quota = 7;
        $this->unpaid_leave_quota = 0;
        $this->save();
    }

    // Calculate how much leave user has taken this year
    public function leaveTakenThisYear()
    {
        return LeaveRequest::where('user_id', $this->id)
            ->whereYear('leave_date', now()->year)
            ->where('status', 'approved') // Only count approved leaves
            ->sum('days'); 
    }

    // Fetch a single user record
    static public function getSingle($id)
    {
        return self::find($id);
    }

    // Get user records with role data
    static public function getRecord()
    {
        return User::select('users.*', 'role.name as role_name', 'users.job_position', 'users.annual_leave_quota','users.sick_leave_quota',
        'users.emergency_leave_quota','users.maternity_leave_quota','users.paternity_leave_quota','users.unpaid_leave_quota','users.profile_photo', 'users.age', 'users.passport_number', 'users.employment_pass', 'users.address', 'users.phone')
            ->join('role', 'role.id', '=', 'users.role_id')
            ->orderBy('users.id', 'desc')
            ->get();
    }

    // Activity log setup
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name', 'email', 'job_position', 'annual_leave_quota', 'profile_photo', 'age', 'passport_number',
                'employment_pass', 'address', 'phone'
            ])
            ->dontLogIfAttributesChangedOnly([
                'updated_at', 'last_login_at', 'remember_token', 'mfa_token', 'mfa_expires_at'
            ])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn (string $eventName) => "User {$this->name} has been {$eventName}")
            ->useLogName('user');
    }

    // Role relationship
    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }
}
