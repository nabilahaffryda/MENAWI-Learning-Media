<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::resource('user', UsersController::class);
Route::resource('level', LevelController::class);
Route::resource('theme', ThemeController::class);
Route::resource('question', QuestionController::class);
Route::resource('answer', AnswerController::class);
Route::resource('material', MaterialController::class);
Route::resource('description', DescriptionController::class);

// Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/loginPost', [AuthController::class, 'loginPost']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registerPost', [AuthController::class, 'registerPost']);
Route::get('/logout', [AuthController::class, 'logout']);
