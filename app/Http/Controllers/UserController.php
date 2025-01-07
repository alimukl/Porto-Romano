<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use Hash;
use Auth;

class UserController extends Controller
{
    public function list()
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add Role',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit Role',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete Role',Auth::user()->role_id);

        $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }

    public function add() //dropdown role
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Add Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        $data['getRole'] = RoleModel::getRecord();
        return view ('panel.user.add', $data);
    }

    public function edit($id) //retrieve existing data
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Edit Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = RoleModel::getRecord();
        return view ('panel.user.edit', $data);
    }

    public function insert(Request $request)
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Add Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        request()->validate ([
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',  // Add validation for age
            'passport_number' => 'required|string',  // Add validation for passport_number
            'employment_pass' => 'required|string',  // Add validation for employment_pass
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->age = trim($request->age);  // Save age
        $user->passport_number = trim($request->passport_number);  // Save passport_number
        $user->employment_pass = trim($request->employment_pass);  // Save employment_pass
        $user->save();

        return redirect('panel/user')->with('success', "User successfully created");

    }

    public function update($id, Request $request)
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);

        // Update new fields
        if (!empty($request->age)) {
            $user->age = trim($request->age);
        }
        if (!empty($request->passport_number)) {
            $user->passport_number = trim($request->passport_number);
        }
        if (!empty($request->employment_pass)) {
            $user->employment_pass = trim($request->employment_pass);
        }

        $user->save();

        return redirect('panel/user')->with('success', "User successfully updated");
    }


    public function delete($id)
    {
        //permission to page by link
        $PermissionRole = PermissionRoleModel::getPermission('Delete Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        $user = User::getSingle($id);
        $user->delete();

        return redirect('panel/user')->with('success',"User successfully deleted");
    }
}
