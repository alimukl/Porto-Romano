<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Facades\Activity;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {

    }
    
}
