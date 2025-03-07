<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'reason', 'leave_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getRecord()
    {
        return LeaveRequest::get();
    }
}

