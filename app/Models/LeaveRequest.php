<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class LeaveRequest extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['user_id', 'reason', 'leave_date', 'status', 'mc_pdf'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getRecord()
    {
        return LeaveRequest::get();
    }

    // Configure activity logging options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'user_id', 'reason', 'leave_date', 'status', 'mc_pdf'
            ])
            ->dontLogIfAttributesChangedOnly([
                'updated_at', 'reviewed_at', 'approved_by'
            ]) // Ignore non-essential changes
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Leave request for User ID {$this->user_id} has been {$eventName}")
            ->useLogName('leave_request');
    }
}
