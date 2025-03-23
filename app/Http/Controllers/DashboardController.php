<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionRoleModel;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $PermissionRole = PermissionRoleModel::getPermission('Dashboard',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $logs = Activity::latest()->take(7)->get(); // Fetch latest 5 log activities
        $totalUsers = User::count(); // Get total number of users
        $totalPendingLeave = LeaveRequest::where('status', 'pending')->count(); // Count pending leave requests
        $todayLogCount = Activity::whereDate('created_at', Carbon::today())->count(); // Get today's log count
        
        // Get the first 6 leave requests
        $getSixRecord = LeaveRequest::take(6)->get(); // Retrieve the first 6 leave requests
        
        return view('panel.dashboard', compact('logs', 'totalUsers', 'totalPendingLeave', 'todayLogCount', 'getSixRecord')); // Pass data to the view
    }    
    
}
