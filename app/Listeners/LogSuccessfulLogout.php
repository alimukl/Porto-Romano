<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Spatie\Activitylog\Facades\Activity;

class LogSuccessfulLogout
{
    public function handle(Logout $event): void
    {
        if ($event->user) {
            Activity::causedBy($event->user)
                ->causedBy($event->user)
                ->log("User {$event->user->name} logged out.");
        }
    }
}
