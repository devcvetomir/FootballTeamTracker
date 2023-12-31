<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TokenController extends Controller
{
    public function getToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
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
            Log::info('Token is valid', ['user' => $user->toArray()]);
            return response()->json(['message' => 'Token is valid', 'user' => $user]);
        }

        Log::warning('Unauthorized request', ['request' => $request->all()]);
        return response()->json(['error' => 'Unauthorized'], 401);
    }

}
