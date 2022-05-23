<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $theme = Theme::with('level')->get();
        return view('theme.index', compact('theme'));
    }

    public function create()
    {
        $lev = Level::all();
        return view('theme.create', compact('lev'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'level_id' => 'required',
            'theme_name' => 'required',
        ]);
        Theme::create($validatedData);
        return redirect()->route('theme.index');
    }

    public function edit($theme_id)
    {
        $lev = Level::all();
        $theme = Theme::with('level')->findOrFail($theme_id);
        return view('theme.edit', compact('theme', 'lev'));
    }

    public function update(Request $request, $theme_id)
    {
        $validatedData = $request->validate([
            'theme_id' => 'required',
            'level_id' => 'required',
            'theme_name' => 'required',
        ]);
        Theme::where('theme_id', $theme_id)->update($validatedData);
        return redirect()->route('theme.index');
    }

    public function destroy($theme_id)
    {
        $theme = Theme::where('theme_id', $theme_id)->first();
        if ($theme != null) {
            $theme->delete();
            return redirect()->route('theme.index');
        }
        return redirect()->route('theme.index');
    }
}
