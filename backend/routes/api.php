<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\HomeAPIController;
use App\Http\Controllers\MaterialAPIController;
use App\Http\Controllers\QuizAPIController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthAPIController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
});

Route::controller(QuizAPIController::class)->group(function(){
    Route::get('/themes', 'getTheme');
    Route::get('/themes/{id}', 'getThemeById');
    Route::get('/questions', 'getQuestion');
    Route::get('/questions/{id}', 'getQuestionByThemeId');
    Route::get('/levels', 'getLevel');
    Route::get('/levels/{id}', 'getThemeByLevelId');
    Route::get('/levels/{level_id}/themes/{theme_id}', 'getQuestionByLevelTheme');
    Route::post('/answers', 'saveAnswer');
    Route::get('/answers/{user_id}', 'checkAnswerByUserID');
});

Route::controller(MaterialAPIController::class)->group(function () {
    Route::get('/materials', 'getAllMaterial');
    Route::get('/materials/{material_id}', 'getDescByMaterial');
});

Route::controller(HomeAPIController::class)->group(function () {
    Route::get('/allanswer', 'getDataAnswer');
});