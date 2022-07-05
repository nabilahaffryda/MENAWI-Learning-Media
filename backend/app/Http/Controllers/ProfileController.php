<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.edit');
    }
    public function edit()
    {
        // $profile = Session::get("username");
        // $user = User::where("username", $profile);
        // return view('profile.edit', compact('user'));
    }
    public function update(Request $request, $user_id)
    {
        // request()->validate([
        //     'name'       => 'required',
        //     'username'      => 'required|unique:users' . $user_id . ',user_id',
        //     'password' => 'nullable|required_with:password|min:8'
        // ]);
        // $user = User::find($user_id);
        // $user->name = Session::get("name");
        // $user->username = Session::get("username");
        // if ($request->filled('password')) {
        //     if (Hash::check($request->password, $user->password)) {
        //         $user->update([
        //             'password' => Hash::make($request->password)
        //         ]);
        //     } else {
        //         return back()
        //             ->withErrors(['password' => __('Masukkan kata sandi yang benar')])
        //             ->withInput();
        //     }
        // }
        // $user->save();
        // return back()->with('status', 'Profil terupdate!');
    }
}
