<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Auth API Routes
 */
Route::prefix('auth')->group( function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/registerCustomer', [AuthController::class, 'registerCustomer']);
    Route::post('/social_login', [AuthController::class, 'social_login']);
    Route::middleware('jwt.verify')->group( function(){
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::post('/add_device', [AuthController::class, 'addDevice']);
    });

    Route::get('/heard_from_list', [AuthController::class, 'heard_from_list']);
});


Route::post(
    'paystack_webhook',
    [\App\Http\Controllers\Api\Customer\SubscriptionController::class, 'paystack_webhook']
);

/**
 * Customer API Routes
 */
require __DIR__ . '/api/customer.php';

