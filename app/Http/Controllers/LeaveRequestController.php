<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index()//display table
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add Leave',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit Leave',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete Leave',Auth::user()->role_id);

        $data['getRecord'] = LeaveRequest::getRecord();
        return view('leave_requests.index', $data);

    }

    public function apply()
    {
        $user = Auth::user(); 
    
        // only take user leave application
        $leaveRequests = LeaveRequest::where('user_id', $user->id)
            ->with('user')
            ->get();
    
        return view('apply_leave.index', compact('leaveRequests'));
    }    

    public function create() //display form //apply form
    {
        return view('leave_requests.create');
    }

    public function store(Request $request) //store data
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'leave_date' => 'required|date|after:today',
        ]);

        LeaveRequest::create([
            'user_id' => Auth::id(),
            'reason' => $request->reason,
            'leave_date' => $request->leave_date,
            'status' => 'pending',
        ]);

        return redirect()->route('leave_requests.index')->with('success', 'Leave request submitted successfully.');
    }

    public function approve($id) //edit status 
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        
        if (in_array(Auth::user()->role_id, [1, 2])) {
            $leaveRequest->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Leave request approved.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function reject($id) //edit status
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        
        if (in_array(Auth::user()->role_id, [1, 2])) {
            $leaveRequest->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Leave request rejected.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function edit($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);

        // Only Admin (role_id 1 or 2) can edit
        if (!in_array(Auth::user()->role_id, [1, 2])) {
            return redirect()->route('leave_requests.index')->with('error', 'Unauthorized action.');
        }

        return view('leave_requests.edit', compact('leaveRequest'));

    }

    public function update($id, Request $request)
    {
        // Check if user has permission (Only Admins can update)
        if (!in_array(Auth::user()->role_id, [1, 2])) {
            return redirect()->route('leave_requests.index')->with('error', 'Unauthorized action.');
        }

        // Retrieve the leave request
        $leaveRequest = LeaveRequest::findOrFail($id);

        // Validate input
        $request->validate([
            'reason' => 'required|string|max:255',
            'leave_date' => 'required|date|after:today',
        ]);

        // Update leave request fields
        $leaveRequest->reason = trim($request->reason);
        $leaveRequest->leave_date = trim($request->leave_date);

        // Save changes
        $leaveRequest->save();

        return redirect()->route('leave_requests.index')->with('success', 'Leave request updated successfully.');
    }


    public function delete($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $user = Auth::user();

        // Only Super Admin (1) and Admin (2) can delete leave requests
        if (in_array($user->role_id, [1, 2])) {
            $leaveRequest->delete();
            return redirect()->route('leave_requests.index')->with('success', 'Leave request deleted successfully.');
        }

        return redirect()->route('leave_requests.index')->with('error', 'Unauthorized action.');
    }
}
