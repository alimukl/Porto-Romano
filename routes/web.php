<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

//public route
Route::get('/', [AuthController::class, 'login'])->name('login'); 
Route::post('/', [AuthController::class,'auth_login']);

Route::get('logout', [AuthController::class,'logout']);

Route::post('/send-mfa', [AuthController::class, 'sendMfaCode'])->name('send.mfa');
Route::post('/verify-mfa', [AuthController::class, 'verifyMfaCode'])->name('verify.mfa');

//display verify
Route::get('/verify-mfa', function () {
    return view('auth.mfa');
})->name('verify.mfa.form');

Route::group(['middleware' => 'useradmin'], function () {

    Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('panel/role', [RoleController::class, 'list'])->name('role.list');
    Route::get('panel/role/add', [RoleController::class, 'add'])->name('role.add');
    Route::post('panel/role/add', [RoleController::class, 'insert'])->name('role.insert');
    Route::get('panel/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('panel/role/edit/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('panel/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    Route::get('panel/user', [UserController::class, 'list'])->name('user.list');
    Route::get('panel/user/add', [UserController::class, 'add'])->name('role.add');
    Route::post('panel/user/add', [UserController::class, 'insert'])->name('role.insert');
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit'])->name('role.edit');
    Route::post('panel/user/edit/{id}', [UserController::class, 'update'])->name('role.update');
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete'])->name('role.delete');

    Route::get('panel/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::put('panel/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

});