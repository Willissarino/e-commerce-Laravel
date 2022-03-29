<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Traits\ApiResponser;

class AdminAuthControllerAPI extends Controller
{
    use ApiResponser;

    public function loginAPI(Request $request)
    {
        if (!Auth::guard('administrator')->validate([
            'email' => $request->email,
            'password' => $request->password,
        ])) 
        {
            return $this->error('Credentials does not match',401);
        }

        $admin = Administrator::whereEmail($request->email)->first();

        return $this->success([
            'access_token' => $admin->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer',
            'message' => 'Logged in as Administrator',
        ]);
    }

    public function logoutAPI(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Token Revoked -- Logged Out as Admin'
        ];

    }
}
