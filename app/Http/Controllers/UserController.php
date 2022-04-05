<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //返回添加页面
    public function add(){
        return view('user.add');
    }

    //接收表单数据
    public function store(Request $request){
        $input = $request->all();
        dd($input);
    }
}
