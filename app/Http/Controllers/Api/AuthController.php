<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function login(AuthLoginRequest $request)
    {
        $validation = $request->only(['email', 'password']);

        try {
            if (!$token = auth()->guard('api')->attempt($validation)) {
                // Login failed
                return new ErrorResource('AUTH.LOGIN.AUTH_FAILED');
            }
        } catch (JWTException $exception) {
            return response()->json(['error' => 'Token 建立無效'], 500);
        }

        return response()->json(['status' => 100, 'token' => $token]);
    }
}
