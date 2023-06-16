<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken as PersonnalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (!$request->has(['email', 'password'])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Request'
            ], 400);
        }
        
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials'
            ], 401);
        }
        
        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User Logged In',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $requestToken = $request->bearerToken();
        $token = PersonnalAccessToken::findToken($requestToken);
        $token->delete();

        return response()->json([
            'success' => true,
            'message' => 'User Logged Out'
        ]);
    }

    public function account(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'User Account Details',
            'data' => [
                'user' => $request->user
            ]
        ]);
    }
}
