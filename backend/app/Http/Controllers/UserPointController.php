<?php

namespace App\Http\Controllers;

use App\Models\UserPoint;
use Illuminate\Http\Request;

class UserPointController extends Controller
{
    public function index()
    {
        $userpoint = UserPoint::all();
        return view('userpoint.index', compact('userpoint'));
    }

    public function create()
    {
        return view('userpoint.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'theme_question_id' => 'required',
            'total_point' => 'required',
        ]);
        UserPoint::create($validatedData);
        return redirect()->route('userpoint.index');
    }

    public function edit($theme_question_id)
    {
        $userpoint = UserPoint::where('theme_question_id', $theme_question_id)->first();
        return view('userpoint.edit', compact('userpoint'));
    }

    public function update(Request $request, $theme_question_id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'theme_question_id' => 'required',
            'total_point' => 'required',
        ]);
        UserPoint::where('theme_question_id', $theme_question_id)->update($validatedData);
        return redirect()->route('userpoint.index');
    }

    public function destroy($theme_question_id)
    {
        $userpoint = UserPoint::where('theme_question_id', $theme_question_id)->first();
        if ($userpoint != null) {
            $userpoint->delete();
            return redirect()->route('userpoint.index');
        }
        return redirect()->route('userpoint.index');
    }
}
