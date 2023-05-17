<?php

use App\Http\Controllers\Api\User\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/token', TokenController::class);
