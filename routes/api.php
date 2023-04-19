<?php

use App\Http\Controllers\Api\V1\AppConfig;
use App\Http\Controllers\Api\V1\Auth;
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


Route::prefix('v1')->group(function() {
    Route::middleware('auth:sanctum')->group(function () {
      Route::post('auth/logout', [Auth::class, 'logout']);
    });
    Route::get('app/config', [AppConfig::class, 'getConfig']);
    
    Route::middleware('guest')->group(function() {
        Route::post('auth/login', [Auth::class, 'login']);
        Route::post('auth/register', [Auth::class, 'register']);
        Route::post('auth/verify_email', [Auth::class, 'emailVerification']);
        Route::post('auth/forgot_password', [Auth::class, 'forgotPassword']);
        Route::post('auth/reset_password', [Auth::class, 'resetPassword']);
    });
   
});