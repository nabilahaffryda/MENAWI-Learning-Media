<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::with('tema')->get();
        return view('question.index', compact('question'));
    }

    public function create()
    {
        $quest = Theme::all();
        return view('question.create', compact('quest'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'theme_id' => 'required',
            'question' => 'required',
            'correct_answer' => 'required',
            'bank_answer' => 'required|array',
            'question_pict' => 'image|file|max:1024',
        ]);
        print_r($request->bank_answer);
        $data = json_decode($request->bank_answer);
        echo $data;
        print_r(json_decode($data));
        if ($request->file('question_pict')) {
            $validatedData['question_pict'] = $request->file('question_pict')->store('post-images');
        }
        Question::create($validatedData);

        return redirect()->route('question.index');
    }

    public function edit($question_id)
    {
        $quest = Theme::all();
        $question = Question::with('tema')->findOrFail($question_id);
        return view('question.edit', compact('question', 'quest'));
    }

    public function update(Request $request, $question_id)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'theme_id' => 'required',
            'correct_answer' => 'required',
            'bank_answer' => 'required',
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
