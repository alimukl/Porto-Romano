<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\PermissionRoleModel;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Log Activity', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }

        // Fetch both login and logout activity logs
        $logs = Activity::latest()->get(); // Fetch all logs
        return view('activity_log', compact('logs'));
    }

    
}

