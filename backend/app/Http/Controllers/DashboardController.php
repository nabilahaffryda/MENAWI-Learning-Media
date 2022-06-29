<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Description;
use App\Models\Level;
use App\Models\Material;
use App\Models\Question;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $question = Question::count();
        $answer = Answer::count();
        $description = Description::count();
        $material = Material::count();
        $level = Level::count();
        $theme = Theme::count();
        return view('dashboard', compact('user', 'question', 'answer', 'description', 'level', 'theme', 'material'));
    }
}
