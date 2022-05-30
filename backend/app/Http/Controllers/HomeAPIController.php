<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class HomeAPIController extends Controller
{
    public function getDataAnswer(){
        $answ = Answer::with('users')->get();
        return response()->json($answ);
    }
}
