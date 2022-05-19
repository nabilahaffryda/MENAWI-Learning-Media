<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Http\Request;

class UserBadgeController extends Controller
{

    public function index()
    {
        $userbadge = UserBadge::with('badge', 'user')->get();
        return view('userbadge.index', compact('userbadge'));
    }

    public function create()
    {
        $us = User::all();
        $bdg = Badge::all();
        return view('userbadge.create', compact('us', 'bdg'));
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

    public function edit($user_badge_id)
    {
        $us = User::all();
        $bdg = Badge::all();
        $userbadge = UserBadge::with('badge', 'user')->where('user_badge_id', $user_badge_id)->first();
        return view('userbadge.edit', compact('userbadge', 'us', 'bdg'));
    }

    public function update(Request $request, $user_badge_id)
    {
        $validatedData = $request->validate([
            'user_badge_id' => 'required',
            'badge_id' => 'required',
            'user_id' => 'required',
            'badge_status' => 'required',
        ]);
        UserBadge::where('user_badge_id', $user_badge_id)->update($validatedData);
        return redirect()->route('userbadge.index');
    }

    public function destroy($user_badge_id)
    {
        $userbadge = UserBadge::where('user_badge_id', $user_badge_id)->first();
        if ($userbadge != null) {
            $userbadge->delete();
            return redirect()->route('userbadge.index');
        }
        return redirect()->route('userbadge.index');
    }
}
