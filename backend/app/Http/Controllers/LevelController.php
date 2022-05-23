<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $level = Level::all();
        return view('level.index', compact('level'));
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'level_name' => 'required',
        ]);
        Level::create($validatedData);
        return redirect()->route('level.index');
    }

    public function edit($level_id)
    {
        $level = Level::findOrFail($level_id);
        return view('level.edit', compact('level'));
    }

    public function update(Request $request, $level_id)
    {
        $validatedData = $request->validate([
            'level_id' => 'required',
            'level_name' => 'required',
        ]);
        Level::where('level_id', $level_id)->update($validatedData);
        return redirect()->route('level.index');
    }

    public function destroy($level_id)
    {
        $level = Level::where('level_id', $level_id)->first();
        if ($level != null) {
            $level->delete();
            return redirect()->route('level.index');
        }
        return redirect()->route('level.index');
    }
}
