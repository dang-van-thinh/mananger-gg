<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::put('/user/status', [UserController::class, 'status'])->name('user.status');

// lay thong tin ca hoc theo lop
Route::get('/sessions/filter', [SessionController::class, 'getSessionByDateAndRoom'])->name('api.sessions.filter');
Route::get('/sessions', [SessionController::class, 'getAllSessionApi'])->name('api.sessions');
