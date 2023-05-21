<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\User\LogoutController;
use App\Http\Controllers\Api\User\RegisterController;
use App\Http\Controllers\Api\User\TokenController;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api.'], function () {
    Route::post('/auth/token', TokenController::class)->name('token');
    Route::post('/auth/register', RegisterController::class)->name('register');

    Route::apiResource('products', ProductController::class, ['except' => ['show', 'store', 'update', 'destroy']]);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/auth/logout', LogoutController::class)->name('logout');
        Route::get('/auth/user', function () {
            return UserResource::make(request()->user());
        })->name('user');

        Route::apiResource('products', ProductController::class, ['except' => ['index']]);
    });
});
