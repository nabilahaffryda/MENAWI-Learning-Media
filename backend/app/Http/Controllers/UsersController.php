<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        $user = User::orderBy('user_id')->get();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ]);

        return redirect()->route('user.index');
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('user_id', $user_id)->update([
            'user_id' => $request->input('user_id'),
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        if ($user != null) {
            $user->delete();
            return redirect()->route('user.index');
        }
        return redirect()->route('user.index');
    }
}
