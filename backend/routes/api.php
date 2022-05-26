<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\QuizController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthAPIController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('user', 'user');
});

Route::controller(QuizController::class)->group(function(){
    Route::get('/themes', 'getTheme');
    Route::get('/themes/{id}', 'getThemeById');
    Route::get('/questions', 'getQuestion');
    Route::get('/questions/{id}', 'getQuestionByThemeId');
});