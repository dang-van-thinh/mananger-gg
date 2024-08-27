<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::get('/',[DashboardController::class,'dashboard']);

Route::resource('teachers', TeacherController::class);
