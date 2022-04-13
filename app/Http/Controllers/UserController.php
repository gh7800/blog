<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //返回添加页面
    public function add(){
        return view('user.add');
    }

    //接收表单数据
    public function store(Request $request){
        $input = $request->except('_token');
        $input['password'] = md5($input['password']);
//        dd($input['password']);

        $request = User::create($input);
//        dd($request);
        if($request){
            return redirect('user/index');
        }else{
            return back();
        }
    }

    //用户列表
    public function index(){
        $user = User::all();
        return view('user.index',compact('user'));
    }
}
