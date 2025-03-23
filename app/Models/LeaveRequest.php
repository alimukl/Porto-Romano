<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Carbon\Carbon;

class LeaveRequest extends Model
{
    use HasFactory, LogsActivity;

    // Updated fillable fields to match new table structure
    protected $fillable = ['user_id', 'category', 'leave_date_start', 'leave_date_end', 'days', 'status', 'mc_pdf'];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get all records (unchanged)
    static public function getRecord()
    {
        return LeaveRequest::get();
    }

    // Auto-calculate days based on start and end date
    public function calculateDays()
    {
        $start = Carbon::parse($this->leave_date_start);
        $end = Carbon::parse($this->leave_date_end);
        return $start->diffInDays($end) + 1; // +1 to include the start date itself
    }

    // Override save method to auto-calculate days before saving
    public static function boot()
    {
        parent::boot();

        static::creating(function ($leaveRequest) {
            $leaveRequest->days = $leaveRequest->calculateDays();
        });

        static::updating(function ($leaveRequest) {
            $leaveRequest->days = $leaveRequest->calculateDays();
        });
    }

    // Configure activity logging options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'user_id', 'category', 'leave_date_start', 'leave_date_end', 'days', 'status', 'mc_pdf'
            ])
            ->dontLogIfAttributesChangedOnly([
                'updated_at', 'reviewed_at', 'approved_by'
            ]) // Ignore non-essential changes
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Leave request for User ID {$this->user_id} has been {$eventName}")
            ->useLogName('leave_request');
    }
}
