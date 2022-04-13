<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

//添加用户路由
Route::get('user/add', [UserController::class,'add']);

//执行添加用户路由
Route::post('user/store', [UserController::class,'store']);

//用户列表页
Route::get('user/index', [UserController::class,'index']);

//用户修改页面
Route::get('user/edit/{id}',[UserController::class,'edit']);

//用户提交修改
Route::post('user/update',[UserController::class,'update']);
