<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Wrong Credentials'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function checkToken(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json(['message' => 'Token is valid', 'user' => $user]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

}
