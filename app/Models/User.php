<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Crypt;


class User extends Authenticatable  
{
    use HasFactory, Notifiable, LogsActivity;

    protected $fillable = [
        'name',
        'email',
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
        ];
    }

    public function setAttribute($key, $value)
    {
        $encryptedFields = ['address', 'employment_pass', 'passport_number'];
    
        // Check if the field needs encryption and ensure it's not already encrypted
        if (in_array($key, $encryptedFields) && !is_null($value)) {
            // Only encrypt if the value isn't already encrypted
            if (!str_starts_with($value, 'eyJpdiI6')) { 
                $value = Crypt::encryptString($value);
            }
        }
    
        parent::setAttribute($key, $value);
    }    

    public function getAttribute($key) //decrypt for display
    {
        $encryptedFields = ['address', 'employment_pass', 'passport_number'];

        $value = parent::getAttribute($key);

        if (in_array($key, $encryptedFields) && !is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (\Exception $e) {
                return $value; // Return raw data if decryption fails (for safety)
            }
        }

        return $value;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return User::select('users.*', 'role.name as role_name', 'users.profile_photo', 'users.age', 'users.passport_number', 'users.employment_pass','users.address','users.phone')
                    ->join('role', 'role.id', '=', 'users.role_id')
                    ->orderBy('users.id', 'desc')
                    ->get();
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name', 'email', 'profile_photo', 'age', 'passport_number', 
                'employment_pass', 'address', 'phone'
            ])
            ->dontLogIfAttributesChangedOnly([
                'updated_at', 'last_login_at', 'remember_token', 'mfa_token', 'mfa_expires_at'
            ]) // ⬅ Ignore these changes to prevent unnecessary logs
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "User {$this->name} has been {$eventName}")
            ->useLogName('user');
    }

    public function role() //to fetch role-id name ( make a connection to read role name)
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }

}


