<?php

namespace App\Http\Controllers;

use App\Models\QuizLevel;
use Illuminate\Http\Request;

class QuizLevelController extends Controller
{
    public function index()
    {
        $quizlevel = QuizLevel::all();
        return view('quizlevel.index', compact('quizlevel'));
    }

    public function create()
    {
        return view('quizlevel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'level_name' => 'required',
        ]);

        $quizlevel = QuizLevel::create([
            'level_name' => $request->input('level_name'),
        ]);

        return redirect()->route('quizlevel.index');
    }

    public function edit($level_id)
    {
        $quizlevel = QuizLevel::findOrFail($level_id);
        return view('quizlevel.edit', compact('quizlevel'));
    }

    public function update(Request $request, $level_id)
    {
        $this->validate($request, [
            'level_id' => 'required',
            'level_name' => 'required',
        ]);
        $quizlevel = QuizLevel::where('level_id', $level_id)->update([
            'level_id' => $request->input('level_id'),
            'level_name' => $request->input('level_name'),
        ]);

        return redirect()->route('quizlevel.index');
    }

    public function destroy($level_id)
    {
        $quizlevel = QuizLevel::where('level_id', $level_id)->first();
        if ($quizlevel != null) {
            $quizlevel->delete();
            return redirect()->route('quizlevel.index');
        }
        return redirect()->route('quizlevel.index');
    }
}
