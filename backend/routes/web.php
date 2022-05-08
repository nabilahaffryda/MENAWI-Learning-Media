<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuizLevelController;
use App\Http\Controllers\QuizThemeController;
use App\Http\Controllers\QuizThemeQuestionController;
use App\Http\Controllers\QuizThemeAnswerController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialDescController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\UserBadgeController;
use App\Http\Controllers\UserPointController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::resource('user', UsersController::class);
Route::resource('quizlevel', QuizLevelController::class);
Route::resource('quiztheme', QuizThemeController::class);
Route::resource('quizthemequestion', QuizThemeQuestionController::class);
Route::resource('quizthemeanswer', QuizThemeAnswerController::class);
Route::resource('material', MaterialController::class);
Route::resource('materialdesc', MaterialDescController::class);
Route::resource('badge', BadgeController::class);
Route::resource('userbadge', UserBadgeController::class);
Route::resource('userpoint', UserPointController::class);
