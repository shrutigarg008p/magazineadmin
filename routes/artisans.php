<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['prefix' => 'idg25h9zb0'], function () {

    //Clear Cache facade value:
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        return '<h1>Cache facade value cleared</h1>';
    });

    //Reoptimized class loader:
    Route::get('/optimize', function () {
        Artisan::call('optimize');
        return '<h1>Reoptimized class loader</h1>';
    });

    //Route cache:
    Route::get('/route-cache', function () {
        Artisan::call('route:cache');
        return '<h1>Routes cached</h1>';
    });

    //Clear Route cache:
    Route::get('/route-clear', function () {
        Artisan::call('route:clear');
        return '<h1>Route cache cleared</h1>';
    });

    //Clear View cache:
    Route::get('/view-clear', function () {
        Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/config-cache', function () {
        Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });
});
