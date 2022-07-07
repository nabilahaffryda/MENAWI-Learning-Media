<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserLogin;
use App\Http\Requests\ValidateUserRegistration;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class AuthAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(ValidateUserRegistration $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        return new UserResource($user);
    }

    public function login(ValidateUserLogin $request)
    {
        $credentials = request(['username', 'password']);
        $user = Auth::user();
        if (!$token = auth()->attempt($credentials)) {
            return  response()->json([
                'errors' => [
                    'msg' => ['Incorrect username or password.']
                ]
            ], 401);
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Logged in.',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function user()
    {
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

}
