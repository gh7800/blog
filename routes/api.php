<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
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
//Route::apiResources([
//    'user' => 'API\AuthController'
//]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Controllers Within The "App\Http\Controllers\Api" Namespace
Route::namespace('api')->group(function () {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/authuserinfo', [AuthController::class,'info']);
});

//Route::middleware('auth:api')->get('/login', function (Request $request) {
//    return $request->user();
//});
