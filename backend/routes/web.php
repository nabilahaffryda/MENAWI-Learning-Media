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
Route::get('quizlevel', function () {return view('quizlevel/quizlevel');});
Route::get('quiztheme', function () {return view('quiztheme/quiztheme');});
Route::get('quizthemequestion', function () {return view('quizthemequestion/quizthemequestion');});
Route::get('quizthemeanswer', function () {return view('quizthemeanswer/quizthemeanswer');});
Route::get('material', function () {return view('material/material');});
Route::get('materialdesc', function () {return view('materialdesc/materialdesc');});
Route::get('user', function () {return view('user/user');});
Route::get('userpoint', function () {return view('userpoint/userpoint');});
Route::get('badge', function () {return view('badge/badge');});
Route::get('login', function () {return view('auth/login');});
Route::get('register', function () {return view('auth/register');});
Route::get('user/add', function () {return view('user/add');});
Route::get('user/edit', function () {return view('user/edit');});