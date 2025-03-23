<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add Leave',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit List Leave',Auth::user()->role_id);
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

    public function create() //display form for own id
    {
        return view('apply_leave.create');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'leave_date_start' => 'required|date|after:today',
            'leave_date_end' => 'required|date|after_or_equal:leave_date_start',
            'mc_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $user = Auth::user();

        // Calculate the number of days
        $start = Carbon::parse($request->leave_date_start);
        $end = Carbon::parse($request->leave_date_end);
        $days = $start->diffInDays($end) + 1;

        // Check if user has enough annual leave quota
        if ($days > $user->annual_leave_quota) {
            return redirect()->back()->with('error', 'You do not have enough annual leave quota.');
        }

        // Handle PDF upload if provided
        $mcPdfPath = null;
        if ($request->hasFile('mc_pdf')) {
            $mcPdfPath = $request->file('mc_pdf')->store('mc_pdfs', 'public');
        }

        // Create the leave request
        LeaveRequest::create([
            'user_id' => $user->id,
            'category' => $request->category,
            'leave_date_start' => $request->leave_date_start,
            'leave_date_end' => $request->leave_date_end,
            'days' => $days,
            'status' => 'pending',
            'mc_pdf' => $mcPdfPath,
        ]);

        return redirect()->route('apply_leave.index')->with('success', 'Leave request submitted successfully.');
    }
    
    public function createForUser() //display form for all user
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Add Leave',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $users = User::all(); // Fetch all users from the database
        return view('leave_requests.create', compact('users')); // Pass users to the view
    }

    // Admin assigns leave for a specific user
    public function storeForUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category' => 'required|string|max:255',
            'leave_date_start' => 'required|date|after:today',
            'leave_date_end' => 'required|date|after_or_equal:leave_date_start',
            'mc_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $user = User::findOrFail($request->user_id);

        // Calculate leave days
        $start = Carbon::parse($request->leave_date_start);
        $end = Carbon::parse($request->leave_date_end);
        $days = $start->diffInDays($end) + 1;

        // Check if the user has enough quota
        if ($days > $user->annual_leave_quota) {
            return redirect()->back()->with('error', 'This user does not have enough annual leave quota.');
        }

        // Handle file upload (optional)
        $mcPdfPath = null;
        if ($request->hasFile('mc_pdf')) {
            $mcPdfPath = $request->file('mc_pdf')->store('mc_pdfs', 'public');
        }

        // Create leave request for the user
        LeaveRequest::create([
            'user_id' => $request->user_id,
            'category' => $request->category,
            'leave_date_start' => $request->leave_date_start,
            'leave_date_end' => $request->leave_date_end,
            'days' => $days,
            'status' => 'pending',
            'mc_pdf' => $mcPdfPath,
        ]);

        return redirect()->route('leave_requests.index')->with('success', 'Leave request submitted successfully for the selected user.');
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
        $user = User::findOrFail($leaveRequest->user_id);
    
        // Check if the leave is already approved
        if ($leaveRequest->status === 'approved') {
            return redirect()->back()->with('error', 'Leave request has already been approved.');
        }
    
        // Check if user has enough remaining quota
        if ($leaveRequest->days > $user->annual_leave_quota) {
            return redirect()->back()->with('error', 'User does not have enough leave quota for this request.');
        }
    
        // Deduct the leave days from the user's quota
        $user->forceFill([
            'annual_leave_quota' => $user->annual_leave_quota - $leaveRequest->days,
        ])->save();        
    
        // Update status to approved
        $leaveRequest->update(['status' => 'approved']);
    
        return redirect()->back()->with('success', 'Leave request approved, and quota updated.');
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
    
        if (empty($PermissionRole)) {
            return view('error.401'); // Unauthorized access
        }
    
        // Find the leave request record
        $leaveRequest = LeaveRequest::findOrFail($id);
    
        // Check if there is an attached PDF file and delete it
        if ($leaveRequest->mc_pdf) {
            $filePath = storage_path('app/public/' . $leaveRequest->mc_pdf);
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file from storage
            }
        }
    
        // Delete the leave request record
        $leaveRequest->delete();
    
        return redirect()->route('leave_requests.index')->with('success', 'Leave request and associated PDF deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->input('ids'), true);

        // Debug check
        if (empty($ids) || !is_array($ids)) {
            return redirect()->back()->with('error', 'No valid requests selected for deletion.');
        }

        try {
            // Ensure IDs are integers to prevent injection
            $ids = array_map('intval', $ids);

            // Fetch all leave requests with the given IDs
            $leaveRequests = LeaveRequest::whereIn('id', $ids)->get();

            foreach ($leaveRequests as $leaveRequest) {
                // Check and delete the associated PDF file if it exists
                if ($leaveRequest->mc_pdf) {
                    $filePath = storage_path('app/public/' . $leaveRequest->mc_pdf);
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file from storage
                    }
                }

                // Delete each leave request record
                $leaveRequest->delete();
            }

            return redirect()->back()->with('success', 'Selected leave requests and associated PDFs have been deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete leave requests. Error: ' . $e->getMessage());
        }
    }
}
