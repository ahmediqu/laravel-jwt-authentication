<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::resource('products', ProductController::class);

Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/check-token', [AuthController::class, 'checkToken'])
        ->name('auth.token');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

});
