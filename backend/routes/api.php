<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAPIController;

Route::controller(AuthAPIController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('user', 'user');
});
