<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'You are not logged in, please login first');
        } else {
            return view('home');
        }
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);
        $data =  new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success', 'You have successfully registered');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = User::where('username', $username)->first();
        if ($data) { //apakah username tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('name', $data->name);
                Session::put('username', $data->username);
                Session::put('login', TRUE);
                return redirect('/');
            } else {
                return redirect('login')->with('alert', 'Your email or password is wrong!');
            }
        } else {
            return redirect('login')->with('alert', 'Your email or password is wrong!');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert', 'You have logged out');
    }
}
