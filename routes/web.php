<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// check git
*/
Route::get('/',[DashboardController::class,'dashboard']);

// Route::get('/list-teacher',[TeacherController::class,'index'])->name('listTeacher');

// Route::get('/create-teacher',[TeacherController::class,'create'])->name('createTeacher');
// Route::post('/create-teacher',[TeacherController::class,'store'])->name('createPostTeacher');

// Route::delete('/delete-teacher/{id}', [TeacherController::class, 'destroy'])->name('deleteTeacher');

// Route::get('/update-teacher/{id}',[TeacherController::class,'edit'])->name('updateTeacher');
// Route::put('/update-teacher/{id}',[TeacherController::class,'update'])->name('updatePostTeacher');

Route::resource('teachers', TeacherController::class);
