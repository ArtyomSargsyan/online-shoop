<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [RegisterController::class, 'store']);
Route::post('/login/', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('logout', [LoginController::class, 'logout']);
    Route::post('product', [ProductController::class, 'store']);
  });

