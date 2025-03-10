<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

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
            ->logOnly(['name', 'email', 'profile_photo', 'age', 'passport_number', 'employment_pass', 'address', 'phone'])
            ->logOnlyDirty() // Log only changes
            ->setDescriptionForEvent(fn(string $eventName) => "User {$this->name} has been {$eventName}")
            ->useLogName('user'); // Custom log name
    }
}
