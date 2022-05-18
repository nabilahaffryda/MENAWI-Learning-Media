<?php

namespace App\Http\Controllers;

use App\Models\QuizLevel;
use App\Models\QuizTheme;
use Illuminate\Http\Request;

class QuizThemeController extends Controller
{
    public function index()
    {
        $quiztheme = QuizTheme::with('level')->get();
        return view('quiztheme.index', compact('quiztheme'));
    }

    public function create()
    {
        $lev = QuizLevel::all();
        return view('quiztheme.create', compact('lev'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'level_id' => 'required',
            'theme_name' => 'required',
        ]);

        $quiztheme = QuizTheme::create([
            'level_id' => $request->input('level_id'),
            'theme_name' => $request->input('theme_name'),
        ]);

        return redirect()->route('quiztheme.index');
    }

    public function edit($theme_id)
    {
        $lev = QuizLevel::all();
        $quiztheme = QuizTheme::with('level')->findOrFail($theme_id);
        return view('quiztheme.edit', compact('quiztheme', 'lev'));
    }

    public function update(Request $request, $theme_id)
    {
        $this->validate($request, [
            'theme_id' => 'required',
            'level_id' => 'required',
            'theme_name' => 'required',
        ]);
        $quiztheme = QuizTheme::where('theme_id', $theme_id)->update([
            'theme_id' => $request->input('theme_id'),
            'level_id' => $request->input('level_id'),
            'theme_name' => $request->input('theme_name'),
        ]);

        return redirect()->route('quiztheme.index');
    }

    public function destroy($theme_id)
    {
        $quiztheme = QuizTheme::where('theme_id', $theme_id)->first();
        if ($quiztheme != null) {
            $quiztheme->delete();
            return redirect()->route('quiztheme.index');
        }
        return redirect()->route('quiztheme.index');
    }
}
