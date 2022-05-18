<?php

namespace App\Http\Controllers;

use App\Models\QuizTheme;
use App\Models\QuizThemeQuestion;
use Illuminate\Http\Request;

class QuizThemeQuestionController extends Controller
{
    public function index()
    {
        $quizthemequestion = QuizThemeQuestion::with('tema')->get();
        return view('quizthemequestion.index', compact('quizthemequestion'));
    }

    public function create()
    {
        $quest = QuizTheme::all();
        return view('quizthemequestion.create', compact('quest'));
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

    public function edit($question_id)
    {
        $quest = QuizTheme::all();
        $quizthemequestion = QuizThemeQuestion::with('tema')->findOrFail($question_id);
        return view('quizthemequestion.edit', compact('quizthemequestion', 'quest'));
    }

    public function update(Request $request, $question_id)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'theme_id' => 'required',
            'question' => 'required',
            'question_point' => 'required',
            'question_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }

        QuizThemeQuestion::where('question_id', $question_id)->update($validatedData);

        return redirect()->route('quizthemequestion.index');
    }

    public function destroy($question_id)
    {
        $quizthemequestion = QuizThemeQuestion::where('question_id', $question_id)->first();
        if ($quizthemequestion != null) {
            $quizthemequestion->delete();
            return redirect()->route('quizthemequestion.index');
        }
        return redirect()->route('quizthemequestion.index');
    }
}
