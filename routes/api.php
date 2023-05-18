<?php

use App\Http\Controllers\Api\User\LogoutController;
use App\Http\Controllers\Api\User\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/token', TokenController::class);

// TODO: Route register

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user/logout', LogoutController::class);

    // TODO: Route product
});
