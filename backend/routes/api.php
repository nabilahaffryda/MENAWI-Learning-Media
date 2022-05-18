<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    Route::post('register', [AuthAPIController::class, 'register']);
    Route::post('login', [AuthAPIController::class, 'login']);
    Route::post('logout', [AuthAPIController::class, 'logout']);
});
