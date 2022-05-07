<?php

namespace App\Http\Controllers;

use App\Models\QuizTheme;
use App\Models\QuizThemeQuestion;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class QuizThemeQuestionController extends Controller
{
    public function index()
    {
        $quizthemequestion = QuizThemeQuestion::all();
        return view('quizthemequestion.index', compact('quizthemequestion'));
    }

    public function create()
    {
        return view('quizthemequestion.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'theme_id' => 'required',
            'question' => 'required',
            'question_point' => 'required',
            'question_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }
        QuizThemeQuestion::create($validatedData);

        return redirect()->route('quizthemequestion.index');
    }

    public function edit($theme_question_id)
    {
        $quizthemequestion = QuizThemeQuestion::findOrFail($theme_question_id);
        return view('quizthemequestion.edit', compact('quizthemequestion'));
    }

    public function update(Request $request, $theme_question_id)
    {
        $validatedData = $request->validate([
            'theme_question_id' => 'required',
            'theme_id' => 'required',
            'question' => 'required',
            'question_point' => 'required',
            'question_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }

        QuizThemeQuestion::where('theme_question_id', $theme_question_id)->update($validatedData);

        return redirect()->route('quizthemequestion.index');
    }

    public function destroy($theme_question_id)
    {
        $quizthemequestion = QuizThemeQuestion::where('theme_question_id', $theme_question_id)->first();
        if ($quizthemequestion != null) {
            $quizthemequestion->delete();
            return redirect()->route('quizthemequestion.index');
        }
        return redirect()->route('quizthemequestion.index');
    }
}
