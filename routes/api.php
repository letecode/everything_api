<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('apikey')->group(function () {

    Route::controller(AuthController::class)->group(function(){
        Route::post('register', 'register');
        Route::post('login', 'login');
    });

    // auth routes
    Route::middleware('auth:sanctum')->group(function () {

    });
});
