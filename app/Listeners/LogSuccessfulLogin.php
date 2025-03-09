<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Facades\Activity;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;
    
        if (!$user) {
            \Log::error('Login event triggered but user is null.');
            return;
        }
    
        // Ensure logging happens only once per session
        if (session()->has('login_logged')) {
            return;
        }
    
        session(['login_logged' => true]);
    
        Activity::event('Login')
            ->causedBy($user)
            ->log("User {$user->name} (ID: {$user->id}) logged in at " . now());
    }
    
}
