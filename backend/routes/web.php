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
Route::get('quizlevel/add', function () {return view('quizlevel/add');});
Route::get('quizlevel/edit', function () {return view('quizlevel/edit');});

Route::get('quiztheme', function () {return view('quiztheme/quiztheme');});
Route::get('quiztheme/add', function () {return view('quiztheme/add');});
Route::get('quiztheme/edit', function () {return view('quiztheme/edit');});

Route::get('quizthemequestion', function () {return view('quizthemequestion/quizthemequestion');});
Route::get('quizthemequestion/add', function () {return view('quizthemequestion/add');});
Route::get('quizthemequestion/edit', function () {return view('quizthemequestion/edit');});

Route::get('quizthemeanswer', function () {return view('quizthemeanswer/quizthemeanswer');});
Route::get('quizthemeanswer/add', function () {return view('quizthemeanswer/add');});
Route::get('quizthemeanswer/edit', function () {return view('quizthemeanswer/edit');});

Route::get('material', function () {return view('material/material');});
Route::get('material/add', function () {return view('material/add');});
Route::get('material/edit', function () {return view('material/edit');});

Route::get('materialdesc', function () {return view('materialdesc/materialdesc');});
Route::get('materialdesc/add', function () {return view('materialdesc/add');});
Route::get('materialdesc/edit', function () {return view('materialdesc/edit');});

Route::get('userpoint', function () {return view('userpoint/userpoint');});
Route::get('userpoint/add', function () {return view('userpoint/add');});
Route::get('userpoint/edit', function () {return view('userpoint/edit');});

Route::get('badge', function () {return view('badge/badge');});
Route::get('badge/add', function () {return view('badge/add');});
Route::get('badge/edit', function () {return view('badge/edit');});

Route::get('login', function () {return view('auth/login');});
Route::get('register', function () {return view('auth/register');});

Route::get('user', function () {return view('user/user');});
Route::get('user/add', function () {return view('user/add');});
Route::get('user/edit', function () {return view('user/edit');});
