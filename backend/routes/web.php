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

// Auth::routes();

// Route::group(['middleware' => 'auth'], function(){
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('user', UsersController::class);
Route::resource('level', LevelController::class);
Route::resource('theme', ThemeController::class);
Route::resource('question', QuestionController::class);
Route::resource('answer', AnswerController::class);
Route::resource('material', MaterialController::class);
Route::resource('description', DescriptionController::class);
// });

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction']);