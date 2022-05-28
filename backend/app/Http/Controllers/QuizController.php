<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Level;
use App\Models\Question;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    private $status = 200;

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
    public function getQuestionByLevelTheme($level_id, $theme_id)
    {
        $qst = Question::with('lev', 'tema')->where('level_id', $level_id)->where('theme_id', $theme_id)->get();
        return response()->json($qst);
    }
    public function saveAnswer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'question_id' => 'required',
                'answer' => 'required',
                'point' => 'required',
            ]
        );
        // if validation fails
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "validation_errors" => $validator->errors()
            ]);
        }

        $answerArray = array(
            "user_id"    =>  $request->user_id,
            "question_id"        =>  $request->question_id,
            "answer"   =>  $request->answer,
            "point"         =>  $request->point
        );
        $ans = Answer::create($answerArray);

        if (!is_null($ans)) {
            return response()->json(["status" => $this->status, "success" => true, "message" => "data jawaban berhasil disimpan", "data" => $ans]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "gagal dibuat"]);
        }
    }
    public function checkAnswerByUserID($user_id){
        $answerUser = Answer::with('users')->where('user_id', $user_id)->get();
        return response()->json($answerUser);
    }
}
