<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\Theme;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function getTheme()
    {
        $theme = Theme::with('level')->get();
        return response()->json($theme);
    }
    public function getThemeById($theme_id)
    {
        $theme = Theme::with('level')->findOrFail($theme_id);
        return response()->json($theme);
    }
    public function getQuestion()
    {
        $qst = Question::with('tema')->get();
        return response()->json($qst);
    }
    public function getQuestionByThemeId($theme_id)
    {
        $quest = Question::with('tema')->where('theme_id', $theme_id)->get();
        return response()->json($quest);
    }
    public function getLevel()
    {
        $lev = Level::all();
        return response()->json($lev);
    }
    public function getThemeByLevelId($level_id)
    {
        $lev = Theme::with('level')->where('level_id', $level_id)->get();
        return response()->json($lev);
    }
    public function getQuestionByLevelTheme($level_id, $theme_id){
        $qst = Question::with('lev','tema')->where('level_id', $level_id)->where('theme_id', $theme_id)->get();
        return response()->json($qst);
    }
    public function saveAnswer(){
        
    }
}
