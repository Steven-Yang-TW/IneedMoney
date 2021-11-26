<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login', 'register');
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

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ]);

        if($validation->failed()){
            return response()->json($validation->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validation->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'messages' => 'User successfully registered',
            'user' => $user,
        ], 201);
    }
}
