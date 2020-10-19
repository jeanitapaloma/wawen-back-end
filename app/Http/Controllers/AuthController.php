<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {

        $data = $request->validated();

        $user =  User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return response($user);
    }

    public function login(AuthRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response([
                'email' => ['The provided credentials are incorrect.'],
            ],403);
        }

        $user->createToken('access_token')->plainTextToken;

        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }

}
