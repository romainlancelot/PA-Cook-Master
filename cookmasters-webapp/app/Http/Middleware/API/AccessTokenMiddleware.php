<?php

namespace App\Http\Middleware\API;

use App\Models\AccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken as PersonnalAccessToken;

class AccessTokenMiddleware
{
    use HasApiTokens;

    /**
     * Handle an incoming request.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$requestToken = $request->bearerToken()) {
            return response()->json([
                'success' => false,
                'message' => 'Access Token not found'
            ], 401);
        }

        $token = PersonnalAccessToken::findToken($requestToken);
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Access Token not found'
            ], 401);
        }

        $request->merge([
            'user' => User::find($token->tokenable->id)
        ]);
        
        return $next($request);
    }
}
