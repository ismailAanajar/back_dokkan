<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\V1\AppConfig;
use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\CmsController;
use App\Http\Controllers\Api\V1\ProductController;
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
      Route::post('addToCart', [ProductController::class, 'addToCart']);
      Route::post('removeFromCart', [ProductController::class, 'removeFromCart']);
      Route::post('updateCart', [ProductController::class, 'updateCart']);
      Route::post('emptyCart', [ProductController::class, 'emptyCart']);
      Route::post('addToWishlist', [ProductController::class, 'addToWishlist']);
      Route::post('removeFromWishlist', [ProductController::class, 'removeFromWishlist']);
      Route::get('profile', [Auth::class, 'profile']);
      Route::post('addAddress', [ProductController::class, 'addAddress']);
      Route::post('address/select', [ProductController::class, 'selectAddress']);
      Route::post('checkout', [ProductController::class, 'checkout']);
    });
    Route::get('app/config', [AppConfig::class, 'getConfig']);
    Route::get('products', [ProductController::class, 'getProducts']);
    Route::get('products/{id}', [ProductController::class, 'getProduct']);
    Route::get('cms/home', [CmsController::class, 'home']);
    Route::get('cms/about', [CmsController::class, 'about']);
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/{slug}', [BlogController::class, 'post']);
    

    
    Route::middleware('guest')->group(function() {
      Route::post('auth/login-as-user', [Auth::class, 'loginAsUser']);
        Route::post('auth/login', [Auth::class, 'login']);
        Route::post('auth/register', [Auth::class, 'register']);
        Route::post('auth/verify_email', [Auth::class, 'emailVerification']);
        Route::post('auth/forgot_password', [Auth::class, 'forgotPassword']);
        Route::post('auth/reset_password', [Auth::class, 'resetPassword']);
    });
   
});