<?php

namespace App\Http\Controllers;

use App\Models\UserBadge;
use Illuminate\Http\Request;

class UserBadgeController extends Controller
{

    public function index()
    {
        $userbadge = UserBadge::all();
        return view('userbadge.index', compact('userbadge'));
    }

    public function create()
    {
        return view('userbadge.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'badge_id' => 'required',
            'user_id' => 'required',
            'badge_status' => 'required',
        ]);
        UserBadge::create($validatedData);
        return redirect()->route('userbadge.index');
    }

    public function edit($user_id)
    {
        $userbadge = UserBadge::where('user_id', $user_id)->first();
        return view('userbadge.edit', compact('userbadge'));
    }

    public function update(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'badge_id' => 'required',
            'user_id' => 'required',
            'badge_status' => 'required',
        ]);
        UserBadge::where('user_id', $user_id)->update($validatedData);
        return redirect()->route('userbadge.index');
    }

    public function destroy($user_id)
    {
        $userbadge = UserBadge::where('user_id', $user_id)->first();
        if ($userbadge != null) {
            $userbadge->delete();
            return redirect()->route('userbadge.index');
        }
        return redirect()->route('userbadge.index');
    }
}
