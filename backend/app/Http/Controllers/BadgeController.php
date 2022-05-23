<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{

    public function index()
    {
        $badge = Badge::all();
        return view('badge.index', compact('badge'));
    }

    public function create()
    {
        return view('badge.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'badge_name' => 'required',

        ]);
        Badge::create($validatedData);
        return redirect()->route('badge.index');
    }

    public function edit($badge_id)
    {
        $badge = Badge::where('badge_id', $badge_id)->first();
        return view('badge.edit', compact('badge'));
    }

    public function update(Request $request, $badge_id)
    {
        $validatedData = $request->validate([
            'badge_id' => 'required',
            'badge_name' => 'required',

        ]);
        Badge::where('badge_id', $badge_id)->update($validatedData);
        return redirect()->route('badge.index');
    }

    public function destroy($badge_id)
    {
        $badge = Badge::where('badge_id', $badge_id)->first();
        if ($badge != null) {
            $badge->delete();
            return redirect()->route('badge.index');
        }
        return redirect()->route('badge.index');
    }
}
