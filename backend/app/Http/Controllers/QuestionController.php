<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Theme;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::with('tema', 'lev')->get();
        return view('question.index', compact('question'));
    }

    public function create()
    {
        $quest = Theme::all();
        $lvl = Level::all();
        return view('question.create', compact('quest', 'lvl'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'theme_id' => 'required',
            'level_id' => 'required',
            'question' => 'required',
            'correct_answer' => 'required',
            'bank_answer' => 'required|array',
            'question_pict' => 'image|file|max:1024',
        ]);
        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }
        Question::create($validatedData);
        return redirect()->route('question.index');
    }

    public function edit($question_id)
    {
        $quest = Theme::all();
        $lvl = Level::all();
        $question = Question::with('tema', 'lev')->findOrFail($question_id);
        return view('question.edit', compact('question', 'quest', 'lvl'));
    }

    public function update(Request $request, $question_id)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'theme_id' => 'required',
            'level_id' => 'required',
            'correct_answer' => 'required',
            'bank_answer' => 'required|array',
            'question_pict' => 'image|file|max:1024',
        ]);

        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }

        Question::where('question_id', $question_id)->update($validatedData);

        return redirect()->route('question.index');
    }

    public function destroy($question_id)
    {
        $question = Question::where('question_id', $question_id)->first();
        if ($question != null) {
            $question->delete();
            return redirect()->route('question.index');
        }
        return redirect()->route('question.index');
    }
}
