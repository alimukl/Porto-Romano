<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\User;
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
            'age' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        // Extra validation for 'user' role
        if ($request->role_id == config('roles.user')) {
            $rules['passport_number'] = 'required|string';
            $rules['employment_pass'] = 'required|string';
        }
    
        $validated = $request->validate($rules);
    
        // Create and save new user
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);
        $user->passport_number = trim($request->passport_number);
        $user->employment_pass = trim($request->employment_pass);
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
    
        // Handle Profile Photo Upload (using the ProfileController style)
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
    
            // Generate unique filename
            $fileName = uniqid() . '.' . $profilePhoto->getClientOriginalExtension();
    
            // Store the file in the 'public/profile_photos' directory
            $filePath = $profilePhoto->storeAs('profile_photos', $fileName, 'public');
    
            // Save file path to user model
            $user->profile_photo = 'profile_photos/' . basename($filePath);
        }
    
        $user->save();
    
        return redirect('panel/user')->with('success', "User successfully created");
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
            'age' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|string',
            'password' => 'nullable|string|min:6',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        $validated = $request->validate($rules);
    
        // Update user details
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
    
        // Handle Profile Photo Upload
        if ($request->hasFile('profile_photo')) {
            // Delete the old photo if it exists
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }
    
            // Save the new profile photo
            $fileName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('uploads/profile_photos'), $fileName);
            $user->profile_photo = 'uploads/profile_photos/' . $fileName;
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
