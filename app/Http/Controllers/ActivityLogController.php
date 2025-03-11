<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\PermissionRoleModel;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Log Activity', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }

        // Fetch all logs
        $logs = Activity::latest()->get();

        // Pass both variables to the view
        return view('activity_log', compact('logs'));

    }
}
