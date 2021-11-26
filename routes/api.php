<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'prefix'=>'auth'
], function() {

    Route::get('me', [AuthController::class, 'me'])->name('me');
    // 使用者登入
    Route::post('login', [AuthController::class, 'login'])->name('login');
    // 使用者登出
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // 使用者註冊
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
