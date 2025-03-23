<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Hash;
use Auth;

class UserController extends Controller
{

    public function showLogs()
    {
        $logs = \Spatie\Activitylog\Models\Activity::where('log_name', 'user')->latest()->paginate(10);
        return view('admin.logs', compact('logs'));
    }

    public function list()
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete User',Auth::user()->role_id);

        $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }

    public function add() //dropdown role
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $data['getRecord'] = User::getRecord();
        $data['getRole'] = RoleModel::getRecord();
        return view ('panel.user.add', $data);
    }

    public function edit($id) //retrieve existing data
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);    

        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = RoleModel::getRecord();
        
        return view ('panel.user.edit', $data);
    }

    public function insert(Request $request)
    {
        // Permission check
        $PermissionRole = PermissionRoleModel::getPermission('Add User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        // Validation Rules
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'job_position' => 'required|string',
            'start_date' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'passport_number' => 'nullable|string',
            'employment_pass' => 'nullable|string',
        ];
    
        // Extra validation if 'user' role is selected
        if ($request->role_id == config('roles.user')) {
            $rules['passport_number'] = 'required|string';
            $rules['employment_pass'] = 'required|string';
        }
    
        $validated = $request->validate($rules);
        
    
        try {
            // Create and save new user
            $user = new User();
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->role_id = trim($request->role_id);
            $user->age = trim($request->age);
            $user->address = trim($request->address);
            $user->phone = trim($request->phone);
            $user->job_position = trim($request->job_position);
            $user->start_date = $request->start_date;
    
            // Save Passport Number and Employment Pass (guaranteed)
            $user->passport_number = $request->passport_number ?? null;
            $user->employment_pass = $request->employment_pass ?? null;
    
            // Set annual leave quota using model function
            $user->annual_leave_quota = $user->calculateAnnualLeaveQuota();
    
            // Handle Profile Photo Upload
            if ($request->hasFile('profile_photo')) {
                // Delete old photo if exists
                if ($user->profile_photo && file_exists(public_path('storage/' . $user->profile_photo))) {
                    unlink(public_path('storage/' . $user->profile_photo));
                }
    
                // Generate unique filename and store the file
                $fileName = uniqid() . '.' . $request->profile_photo->getClientOriginalExtension();
                $filePath = $request->profile_photo->storeAs('profile_photos', $fileName, 'public');
    
                // Save file path to user model
                $user->profile_photo = 'profile_photos/' . basename($filePath);
            }
    
            $user->save();
    
            return redirect('panel/user')->with('success', "User successfully created");
        } catch (\Exception $e) {
            \Log::error('User creation failed: ' . $e->getMessage());
            return back()->with('error', "Something went wrong! Please try again.");
        }
    }    
    
    
    public function update($id, Request $request)
    {
        // Check permissions
        $PermissionRole = PermissionRoleModel::getPermission('Edit User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        // Fetch user record
        $user = User::findOrFail($id);
    
        // Validation rules
        $rules = [
            'name' => 'required|string',
            'job_position' => 'required|string',
            'start_date' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|string',
            'password' => 'nullable|string|min:6',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        $validated = $request->validate($rules);
    
        // Update user details
        $user->name = trim($request->name);
        $user->job_position = trim($request->job_position);
        $user->start_date = $request->start_date;
        $user->age = trim($request->age);
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
        $user->role_id = trim($request->role_id);
    
        // Only hash password if provided
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
    
        // Recalculate annual leave using the User model method
        $user->annual_leave_quota = $user->calculateAnnualLeaveQuota();

               // Handle file upload for profile photo
        if ($request->hasFile('profile_photo')) {
            // Delete the old profile photo if exists
            if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
                Storage::delete('public/' . $user->profile_photo);
            }

            // Store the new profile photo in the 'public/profile_photos' directory
            $profilePhoto = $request->file('profile_photo');
            $filePath = $profilePhoto->storeAs('profile_photos', uniqid() . '.' . $profilePhoto->getClientOriginalExtension(), 'public');

            // Update the profile_photo field with the file path
            $user->profile_photo = 'profile_photos/' . basename($filePath);
        }
    
        // Save changes
        $user->save();
    
        return redirect('panel/user')->with('success', "User successfully updated");
    }
    
    

    public function delete($id)
    {
        // Permission check
        $PermissionRole = PermissionRoleModel::getPermission('Delete User', Auth::user()->role_id);
    
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        // Fetch user details before deleting
        $user = User::getSingle($id);
    
        if (!$user) {
            return redirect('panel/user')->with('error', "User not found");
        }

        $user->delete();
    
        return redirect('panel/user')->with('success', "User successfully deleted");
    }     

}
