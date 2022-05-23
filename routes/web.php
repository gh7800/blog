<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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

//Route::view('/', 'welcome');

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

//用户删除路由
Route::get('user/del/{id}',[UserController::class,'del']);

//登录页面
//Route::get('login',[UserController::class,'loginPage']);

//登录路由事件
Route::post('user/loginStore',[UserController::class,'loginStore']);

//首页
//Route::get('home',[HomeController::class,'homePage']);

//index
Route::view('/index','index');

//vue
Route::get('/{any}', [IndexController::class,'index'])->where('any', '.*');

//Route::post('api/login', [AuthController::class,'login']);
