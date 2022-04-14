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
        $user = User::all();//获取所有user
        return view('user.index',compact('user'));
    }

    //用户修改页面
    public function edit($id){
        $user = User::find($id);//查询用户
        return view('user.edit',compact('user'));
    }

    //用户提交修改
    public function update(Request $request){
        $res = $request->all();
        $user = User::find($res['id']);
        $result = $user->update(['username'=>$res['username']]);
        if($result){
            return redirect('user/index');
        }else{
            return back();
        }
    }

    public function delete($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return redirect('user/index');
        }else{
            return back();
        }
    }

}
