<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
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
// Route::get('/advertisement', [AdvertisementController::class, 'index']);
Route::middleware('auth:api')->get('/advertisement', function (Request $request) {
	return $request-advertisement();
});

Route::get('/advertisements', [AdvertisementController::class, 'index']);

Route::post('/advertisement', [AdvertisementController::class, 'store']);

Route::get('/advertisements/{id}', [AdvertisementController::class, 'show']);

Route::put('/advertisements/{id}', [AdvertisementController::class, 'update']);

Route::delete('/advertisements/{id}', [AdvertisementController::class, 'destroy']);