<?php

namespace App\Http\Controllers;

use App\Models\QuizTheme;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class UserPointController extends Controller
{
    public function index()
    {
        $userpoint = UserPoint::with('themes', 'users')->get();
        return view('userpoint.index', compact('userpoint'));
    }

    public function create()
    {
        $usr = User::all();
        $thm = QuizTheme::all();
        return view('userpoint.create', compact('usr', 'thm'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'theme_id' => 'required',
            'total_point' => 'required',
        ]);
        UserPoint::create($validatedData);
        return redirect()->route('userpoint.index');
    }

    public function edit($theme_id)
    {
        $usr = User::all();
        $thm = QuizTheme::all();
        $userpoint = UserPoint::with('themes', 'users')->where('theme_id', $theme_id)->first();
        return view('userpoint.edit', compact('userpoint', 'usr', 'thm'));
    }

    public function update(Request $request, $theme_id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'theme_id' => 'required',
            'total_point' => 'required',
        ]);
        UserPoint::where('theme_id', $theme_id)->update($validatedData);
        return redirect()->route('userpoint.index');
    }

    public function destroy($theme_id)
    {
        $userpoint = UserPoint::where('theme_id', $theme_id)->first();
        if ($userpoint != null) {
            $userpoint->delete();
            return redirect()->route('userpoint.index');
        }
        return redirect()->route('userpoint.index');
    }
}
