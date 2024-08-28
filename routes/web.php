<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);

Route::post('/user/status/{id}', [UserController::class, 'status'])->name('user.status');
