<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;



Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::get('/refresh', [AuthController::class, 'refresh']);


Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/check-token', [AuthController::class, 'checkToken'])
        ->name('auth.token');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

    Route::resource('products', ProductController::class);


});
