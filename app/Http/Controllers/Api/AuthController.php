<?php

namespace App\Http\Controllers\Api;

use App\Events\UserLoginEvent;
use App\Exceptions\ApiErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login', 'register');
    }

    /**
     * @param AuthLoginRequest $request
     * @return ErrorResource|LoginResource
     */
    public function login(AuthLoginRequest $request)
    {
        $validation = $request->only(['email', 'password']);

        try {
            if (!$token = auth()->guard('api')->attempt($validation)) {
                // Login failed
                return new ErrorResource('AUTH.LOGIN.AUTH_FAILED');
            }

            # 帳號停用
            if (auth()->user()->isDisable()) {
                auth()->logout();

                return new ErrorResource('AUTH.LOGIN.USER_STATUS_DISABLE');
            }

            /** @noinspection PhpParamsInspection */
            event(new UserLoginEvent(auth()->user(), $request));

            return new LoginResource(['token' => $token]);

        } catch (JWTException $exception) {
            return new ErrorResource($exception->getMessage(), $exception);
        } catch (\Exception $exception) {
            return new ErrorResource('SYSTEM.FAILED', $exception);
        }
    }

    /**
     * @param AuthRegisterRequest $request
     * @return ErrorResource|RegisterResource
     */
    public function register(AuthRegisterRequest $request)
    {
        try {
            # 寫入資料庫
            $user = User::create(array_merge(
                $request->all(),
                ['password' => bcrypt($request->password)]
            ));

            # 登入拿取token
            $validation = $request->only(['email', 'password']);
            $token = auth()->guard('api')->attempt($validation);

            return new RegisterResource(['token' => $token]);
        } catch(ApiErrorException $exception) {
            return new ErrorResource($exception->getMessage());
        } catch(\Exception $exception) {
            return new ErrorResource('SYSTEM.FAILED', $exception);
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 0]);
    }
}
