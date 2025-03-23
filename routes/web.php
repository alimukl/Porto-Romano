<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\PayslipController;

//public route
Route::get('/', [AuthController::class, 'login'])->name('login'); 
Route::post('/', [AuthController::class,'auth_login']);

Route::get('logout', [AuthController::class,'logout']);

Route::post('/send-mfa', [AuthController::class, 'sendMfaCode'])->name('send.mfa');
Route::post('/verify-mfa', [AuthController::class, 'verifyMfaCode'])->name('verify.mfa');

Route::delete('/leave_requests/bulk-delete', [LeaveRequestController::class, 'bulkDelete'])->name('leave_requests.bulkDelete');


//display verify
Route::get('/verify-mfa', function () {
    return view('auth.mfa');
})->name('verify.mfa.form');

Route::group(['middleware' => 'useradmin'], function () {

    Route::get('panel/activity_log', [ActivityLogController::class, 'index'])->name('activity.log');

    Route::get('panel/dashboard', [DashboardController::class, 'index']);

    Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('panel/role', [RoleController::class, 'list'])->name('role.list');
    Route::get('panel/role/add', [RoleController::class, 'add'])->name('role.add');
    Route::post('panel/role/add', [RoleController::class, 'insert'])->name('role.insert');
    Route::get('panel/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('panel/role/edit/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('panel/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    Route::get('panel/user', [UserController::class, 'list'])->name('user.list');
    Route::get('panel/user/add', [UserController::class, 'add'])->name('user.add');
    Route::post('panel/user/add', [UserController::class, 'insert'])->name('user.insert');
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('panel/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('panel/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('panel/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::put('panel/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('panel/leave-requests', [LeaveRequestController::class, 'index'])->name('leave_requests.index');
    Route::post('panel/leave-requests', [LeaveRequestController::class, 'storeForUser'])->name('leave_requests.storeForUser');
    Route::get('panel/leave-requests/create', [LeaveRequestController::class, 'createForUser'])->name('leave_requests.createForUser');

    Route::get('panel/apply_leave', [LeaveRequestController::class, 'apply'])->name('apply_leave.index'); // own user application
    Route::get('panel/apply_leave/create', [LeaveRequestController::class, 'create'])->name('apply_leave.create'); // own user application
    Route::post('panel/apply_leave', [LeaveRequestController::class, 'store'])->name('apply_leave.store'); // own user application
    
    Route::post('panel/leave-requests/{id}/approve', [LeaveRequestController::class, 'approve'])->name('leave_requests.approve');
    Route::post('panel/leave-requests/{id}/reject', [LeaveRequestController::class, 'reject'])->name('leave_requests.reject');

    Route::get('/leave_requests/{id}/edit', [LeaveRequestController::class, 'edit'])->name('leave_requests.edit');
    Route::put('/leave_requests/{id}', [LeaveRequestController::class, 'update'])->name('leave_requests.update');
    Route::delete('/leave_requests/{id}', [LeaveRequestController::class, 'delete'])->name('leave_requests.delete');

    Route::get('panel/payslips/user', [PayslipController::class, 'userPayslips'])->name('payslips.user');
    Route::get('panel/payslips/admin', [PayslipController::class, 'adminPayslips'])->name('payslips.admin');
    Route::post('panel/payslips/upload', [PayslipController::class, 'upload'])->name('payslips.upload');    

    Route::get('/get-payslip', [PayslipController::class, 'getPayslipsByDate'])->name('payslips.byDate');


    Route::get('/payslips/create', [PayslipController::class, 'create'])->name('payslips.create');
    Route::post('/payslips/store', [PayslipController::class, 'store'])->name('payslips.store');


    Route::get('/panel/error', [UserController::class, 'index'])->name('error.401');

    Route::fallback(function () {
        return response()->view('error.404', [], 404);
    });
});