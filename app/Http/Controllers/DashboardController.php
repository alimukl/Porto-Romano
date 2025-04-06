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
        $PermissionRole = PermissionRoleModel::getPermission('Dashboard', Auth::user()->role_id);
        
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        $user = Auth::user(); // Get logged-in user
    
        $logs = Activity::latest()->take(7)->get(); 
        $totalUsers = User::count(); 
        $totalPendingLeave = LeaveRequest::where('status', 'pending')->count(); 
        $todayLogCount = Activity::whereDate('created_at', Carbon::today())->count(); 
    
        // Get the first 6 leave requests for all users
        $getSixRecord = LeaveRequest::take(6)->get(); 
    
        // Get the user's leave requests
        $leaveRequests = LeaveRequest::where('user_id', $user->id)
            ->with('user')
            ->get();
    
        return view('panel.dashboard', compact(
            'logs',
            'totalUsers',
            'totalPendingLeave',
            'todayLogCount',
            'getSixRecord', // Remains for all users
            'leaveRequests', // New for the logged-in user's leave requests
            'user'
        ));
    }        
    
}
