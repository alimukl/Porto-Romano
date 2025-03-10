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
        // Permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Add User', Auth::user()->role_id);
        if (empty($PermissionRole)) {

            return view('error.401');
        }
    
        // Conditionally validate fields based on role
        $rules = [
            'email' => 'required|email|unique:users',
            'age' => 'required|integer', // Add validation for age
            'address' => 'required|string',
            'phone' => 'required|string',
        ];
    
        // Apply validation for employment_pass and passport_number only for 'user' role
        if ($request->role_id == config('roles.user')) {
            $rules['passport_number'] = 'required|string'; // Add validation for passport_number
            $rules['employment_pass'] = 'required|string';  // Add validation for employment_pass
        }
    
        request()->validate($rules);
    
        // Create new user record
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);
        $user->passport_number = trim($request->passport_number);  // Save passport_number
        $user->employment_pass = trim($request->employment_pass);  // Save employment_pass
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
        $user->save();
    
        activity('user')
        ->causedBy(Auth::user())
        ->performedOn($user)
        ->withProperties(['name' => $user->name, 'email' => $user->email])
        ->log('User Created');

        return redirect('panel/user')->with('success', "User successfully created");
    }
    

    public function update($id, Request $request)
    {
        $PermissionRole = PermissionRoleModel::getPermission('Edit User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        // Retrieve the user before updating
        $user = User::findOrFail($id); // Ensure user exists
        $oldData = $user->getOriginal(); // Get original values before update
    
        // Update user details
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
        $user->save();
    
        // Log the update action
        activity('user')
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->withProperties([
                'old' => $oldData, // Log old data
                'new' => $user->getAttributes(), // Log new data
            ])
            ->log('User Updated');
    
        return redirect('panel/user')->with('success', "User successfully updated");
    }    
    

    public function delete($id)
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Delete User',Auth::user()->role_id);

        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        $user = User::getSingle($id);
        $user->delete();

        activity('user')
        ->causedBy(Auth::user())
        ->withProperties($deletedUser)
        ->log('User Deleted');

        return redirect('panel/user')->with('success',"User successfully deleted");
    }

}
