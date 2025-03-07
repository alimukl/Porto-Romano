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
        $PermissionRole = PermissionRoleModel::getPermission('List Leave',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add List Leave',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit List Leave',Auth::user()->role_id);
        $data['PermissionUpdate'] = PermissionRoleModel::getPermission('Update List Leave',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete List Leave',Auth::user()->role_id);
        $data['PermissionApprove'] = PermissionRoleModel::getPermission('Approve List Leave',Auth::user()->role_id);

        $data['getRecord'] = LeaveRequest::getRecord();
        return view('leave_requests.index', $data);

    }

    public function apply()
    {
        $user = Auth::user(); 
    
        // only take own user leave application
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

    public function approve($id) // Edit status
    {
        // Check if the user has permission
        $PermissionRole = PermissionRoleModel::getPermission('Approve List Leave', Auth::user()->role_id);
    
        if (empty($PermissionRole)) { // Explicit check for permission
            return view('error.401'); // Redirect to 401 Unauthorized error page
        }
    
        // Retrieve the leave request
        $leaveRequest = LeaveRequest::findOrFail($id);
        
        // Update status to approved
        $leaveRequest->update(['status' => 'approved']);
    
        return redirect()->back()->with('success', 'Leave request approved.');
    }
    
    public function reject($id) // Edit status
    {
        // Check if the user has permission
        $PermissionRole = PermissionRoleModel::getPermission('Approve List Leave', Auth::user()->role_id);
    
        if (empty($PermissionRole)) { // Explicit check for permission
            return view('error.401'); // Redirect to 401 Unauthorized error page
        }
    
        // Retrieve the leave request
        $leaveRequest = LeaveRequest::findOrFail($id);
        
        // Update status to rejected
        $leaveRequest->update(['status' => 'rejected']);
    
        return redirect()->back()->with('success', 'Leave request rejected.');
    }    

    public function edit($id)
    {
        // Check if the user has the "Edit Leave Request" permission
        $PermissionRole = PermissionRoleModel::getPermission('Edit List Leave', Auth::user()->role_id);
    
        if (empty($PermissionRole)) { // Explicit check instead of empty()
            return view('error.401'); // Redirect to the 401 Unauthorized error page
        }
    
        // Retrieve the leave request
        $leaveRequest = LeaveRequest::findOrFail($id);
        $getRole = RoleModel::getRecord(); // Fetch all available roles
    
        return view('leave_requests.edit', compact('leaveRequest'));
    }    

    public function update($id, Request $request)
    {

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
        // Check if the authenticated user has permission to delete leave requests
        $PermissionRole = PermissionRoleModel::getPermission('Delete List Leave', Auth::user()->role_id);
        
        //dd($PermissionRole);

        if (empty($PermissionRole)) {
            return view('error.401'); // Unauthorized access
        }
    
        // Find the leave request record
        $leaveRequest = LeaveRequest::findOrFail($id);
    
        // Delete the leave request
        $leaveRequest->delete();
    
        return redirect()->route('leave_requests.index')->with('success', 'Leave request deleted successfully.');
    }    

}
