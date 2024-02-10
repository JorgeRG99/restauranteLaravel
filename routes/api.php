<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/createBookingUnAuth', [BookingController::class, 'createAnonymous']);
Route::get('/unavailableDates', [BookingController::class, 'getUnavailableDates']);
Route::get('/unavailableHours', [BookingController::class, 'getUnavailableHoursOnDate']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getUserSessionData', [UserController::class, 'getUserSessionData']);
    Route::post('/createBookingAuth', [BookingController::class, 'createAuthenticated']);
    Route::delete('/deleteBooking', [BookingController::class, 'deleteAuthenticated']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
