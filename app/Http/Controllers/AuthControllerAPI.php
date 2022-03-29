<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthControllerAPI extends Controller
{
    use ApiResponser;

    public function registerAPI(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function loginAPI(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr))
        {
            return $this->error('Credentials does not match',401);
        }

        return $this->success([
            'access_token' => $request->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    public function logoutAPI(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Token Revoked -- Logged Out'
        ];

    }
}
