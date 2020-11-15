<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\mawa\LoginController;

Route::prefix('/user')->group(function() {
  Route::post('/login', 'api\mawa\LoginController@login');
});