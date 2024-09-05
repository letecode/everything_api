<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::middleware('apikey')->group(function () {

    Route::controller(AuthController::class)->group(function(){
        Route::post('register', 'register');
        Route::post('login', 'login');
    });

    // auth routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(ItemController::class)->group(function(){
            Route::get('index', 'index');
            Route::get('items/{item_id}', 'show');
            Route::post('items', 'store');
            Route::put('items/{item_id}', 'update');
            Route::delete('items/{item_id}', 'destroy');
        });
    });
});
