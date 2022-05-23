<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answer = Answer::with('quest', 'users')->get();
        return view('answer.index', compact('answer'));
    }

    public function create()
    {
        $ques = Question::all();
        $usr = User::all();
        return view('answer.create', compact('ques', 'usr'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'question_id' => 'required',
            'answer' => 'required',
            'point' => 'required',
        ]);
        Answer::create($validatedData);
        return redirect()->route('answer.index');
    }

    public function edit($answer_id)
    {
        $ques = Question::all();
        $usr = User::all();
        $answer = Answer::with('quest', 'users')->where('answer_id', $answer_id)->first();
        return view('answer.edit', compact('answer', 'ques', 'usr'));
    }

    public function update(Request $request, $answer_id)
    {
        $validatedData = $request->validate([
            'answer_id' => 'required',
            'user_id' => 'required',
            'question_id' => 'required',
            'answer' => 'required',
            'point' => 'required',
        ]);
        Answer::where('answer_id', $answer_id)->update($validatedData);
        return redirect()->route('answer.index');
    }

    public function destroy($answer_id)
    {
        $answer = Answer::where('answer_id', $answer_id)->first();
        if ($answer != null) {
            $answer->delete();
            return redirect()->route('answer.index');
        }
        return redirect()->route('answer.index');
    }
}
