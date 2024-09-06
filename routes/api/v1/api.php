<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// auth routes
Route::controller(ItemController::class)->middleware(['auth:hh'])->group(function(){
    Route::get('index', 'index');
    Route::get('items/{item_id}', 'show');
    Route::post('items', 'store');
    Route::put('items/{item_id}', 'update');
    Route::delete('items/{item_id}', 'destroy');
});
