<?php

use App\Http\Controllers\Vendor\MagazineController;
use App\Http\Controllers\Vendor\NewspaperController;
use App\Http\Controllers\Vendor\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\ForgotPasswordController;
use App\Http\Controllers\Vendor\SalesController;

# Define All vendor Routes 
Route::prefix('vendor')->name('vendor.')->group( function(){
    Route::get('/', [VendorAuthController::class, 'index'])
        ->name('index');
    Route::post('login', [VendorAuthController::class, 'login'])
        ->name('login');
    Route::get('register', [VendorAuthController::class, 'register'])
        ->name('register');
    Route::post('registered', [VendorAuthController::class, 'registered'])
        ->name('registered');
    Route::get('forgotview', [ForgotPasswordController::class, 'index'])
        ->name('forgotview');
    Route::post('forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])
    ->name('forgotpassword');
    Route::get('forgotpassword/{token}',[ForgotPasswordController::class,'checktoken']);
    Route::post('forgotpasswordupdate',[ForgotPasswordController::class,'forgetpasswordUpdate']);
    Route::get('vendor_terms',[VendorAuthController::class,'vendor_terms'])->name('terms');


    Route::middleware('auth.vendor')->group( function(){

        Route::post('logout', [VendorAuthController::class, 'logout'])
            ->name('logout');
        Route::get('dashboard', [VendorController::class, 'index'])
            ->name('dashboard');
        Route::get('settings', [VendorController::class, 'settings'])
            ->name('settings');
        Route::post('changepassword', [VendorController::class, 'changePassword'])
            ->name('changePassword');

        Route::get('sales', [SalesController::class, 'index'])
            ->name('sales.index');

    });

    Route::group([
        'middleware' => ['role:superadmin|admin|vendor']
    ], function() {
        Route::resource('magazines', MagazineController::class);
        Route::resource('newspapers', NewspaperController::class);

        Route::match(['get'], 'content_make_grid_listing', [MagazineController::class, 'content_make_grid_listing'])
            ->name('content_make_grid_listing');

        Route::match(['get', 'post'], 'content_make_grid', [MagazineController::class, 'content_make_grid'])
            ->name('content_make_grid');

        Route::get('export_listing', [MagazineController::class, 'export_listing'])
            ->name('export_listing');
        Route::get('export_listing_coupon', [MagazineController::class, 'export_listing_coupon'])
            ->name('export_listing_coupon');
        Route::get('export_listing_user_coupon', [MagazineController::class, 'export_listing_user_coupon'])
        ->name('export_listing_user_coupon');
        Route::get('export_listing_user_list', [MagazineController::class, 'export_listing_user_listing'])
        ->name('export_listing_user_listing');
        Route::get('export_listing_systemuser_listing', [MagazineController::class, 'export_listing_systemuser_listing'])
        ->name('export_listing_systemuser_listing');
    });
});