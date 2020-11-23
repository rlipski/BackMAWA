<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\mawa\PassportAuthController;
use App\Http\Controllers\api\mawa\user\UserController;

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
  Route::get('get-user', [PassportAuthController::class, 'userInfo']);

  Route::resource('user', 'api\mawa\user\UserController');

});
