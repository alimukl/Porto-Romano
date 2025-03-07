<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
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
    
        return redirect('panel/user')->with('success', "User successfully created");
    }
    

    public function update($id, Request $request)
    {
        // Permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Edit User', Auth::user()->role_id);
        if (empty($PermissionRole)) {

            return view('error.401');
        }
    
        // Retrieve the user record
        $user = User::getSingle($id);
    
        // Update common fields
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);
        $user->address = trim($request->address);
        $user->phone = trim($request->phone);
    
        // Check role and update employment_pass & passport_number
        if ($user->role_id !== 1 && $user->role_id !== 2) {
            // Update fields for roles that are NOT 1 or 2
            $user->employment_pass = trim($request->employment_pass) ?? $user->employment_pass;
            $user->passport_number = trim($request->passport_number) ?? $user->passport_number;
        } else {
            // Clear fields for roles 1 or 2
            $user->employment_pass = null;
            $user->passport_number = null;
        }
    
        // Save updates
        $user->save();
    
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

        return redirect('panel/user')->with('success',"User successfully deleted");
    }
}
