<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;

use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('rooms', RoomController::class);
Route::resource('sessions', SessionController::class);
Route::resource('expense', ExpenseController::class);
Route::resource('course', CourseController::class);
Route::resource('classes', ClassController::class);
