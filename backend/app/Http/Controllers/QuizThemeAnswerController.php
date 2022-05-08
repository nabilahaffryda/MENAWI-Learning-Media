<?php

namespace App\Http\Controllers;

use App\Models\QuizThemeAnswer;
use Illuminate\Http\Request;

class QuizThemeAnswerController extends Controller
{
    public function index()
    {
        $quizthemeanswer = QuizThemeAnswer::all();
        return view('quizthemeanswer.index', compact('quizthemeanswer'));
    }

    public function create()
    {
        return view('quizthemeanswer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'theme_question_id' => 'required',
            'answer' => 'required',
            'answer_status' => 'required',
            'answer_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('answer_pict')) {
            $validatedData['answer_pict'] = $request->file('answer_pict')->store('post-images');
        }
        QuizThemeAnswer::create($validatedData);

        return redirect()->route('quizthemeanswer.index');
    }

    public function edit($answer_id)
    {
        $quizthemeanswer = QuizThemeAnswer::where('answer_id', $answer_id)->first();
        return view('quizthemeanswer.edit', compact('quizthemeanswer'));
    }

    public function update(Request $request, $answer_id)
    {
        $validatedData = $request->validate([
            'answer_id' => 'required',
            'theme_question_id' => 'required',
            'answer' => 'required',
            'answer_status' => 'required',
            'answer_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('answer_pict')) {
            $validatedData['answer_pict'] = $request->file('answer_pict')->store('post-images');
        }

        QuizThemeAnswer::where('answer_id', $answer_id)->update($validatedData);

        return redirect()->route('quizthemeanswer.index');
    }

    public function destroy($answer_id)
    {
        $quizthemeanswer = QuizThemeAnswer::where('answer_id', $answer_id)->first();
        if ($quizthemeanswer != null) {
            $quizthemeanswer->delete();
            return redirect()->route('quizthemeanswer.index');
        }
        return redirect()->route('quizthemeanswer.index');
    }
}
