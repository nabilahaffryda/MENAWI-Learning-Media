<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {return view('home');});
Route::get('quizlevel', function () {return view('quiz/quizlevel');});
Route::get('quiztheme', function () {return view('quiz/quiztheme');});
Route::get('quizthemequestion', function () {return view('quiz/quizthemequestion');});
Route::get('quizthemeanswer', function () {return view('quiz/quizthemeanswer');});
Route::get('material', function () {return view('material/material');});
Route::get('materialdesc', function () {return view('material/materialdesc');});
Route::get('user', function () {return view('user/user');});
Route::get('userpoint', function () {return view('user/userpoint');});
Route::get('badge', function () {return view('user/badge');});