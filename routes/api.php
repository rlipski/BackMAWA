<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;

Route::post('login',[\Laravel\Passport\Http\Controllers\AccessTokenController::class, 'issueToken'])->middleware(['api-login', 'throttle']);
//Route::get('users/list',[UserController::class, 'index']);
Route::get('/advertisements', [AdvertisementController::class, 'index']);

Route::post('/advertisement', [AdvertisementController::class, 'store']);

Route::get('/advertisements/{id}', [AdvertisementController::class, 'show']);

Route::put('/advertisements/{id}', [AdvertisementController::class, 'update']);

Route::delete('/advertisements/{id}', [AdvertisementController::class, 'destroy']);