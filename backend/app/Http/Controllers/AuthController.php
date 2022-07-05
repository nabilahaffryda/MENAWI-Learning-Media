<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->with('loginError', 'Gagal login');
    }
    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert', 'Anda telah keluar');
    }
    
    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/login')->with('success', 'Anda telah berhasil mendaftar');
    }
}
