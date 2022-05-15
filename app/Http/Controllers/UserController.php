<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //登录
    public function loginPage()
    {
        return view('login');
    }

    //接收登录参数
    public function loginStore(Request $request)
    {
        $input = $request->except('_token');

        $username = $request['username'];
        $password = $request['password'];
        $user = User::find($username);
//        dd($username);

        //验证规则
        $rule = [
            'username' => 'required|between:4,18',
            'password' => 'required|between:4,18|alpha_dash'
        ];
        //错误信息
        $err = [
            'username.required' => '用户名必须输入',
            'username.between' => '用户名长度4-18位',
            'password.required' => '密码必须输入',
            'password.between' => '密码长度4-18位',
        ];
        $validator = Validator::make($input, $rule,$err);

        if ($validator->fails()) {
            return
                redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }else{
            return redirect('home');
        }

    }

    //返回添加页面
    public function add()
    {
        return view('user.add');
    }

    //接收表单数据
    public function store(Request $request)
    {
//        dd($request);
        $input = $request->except('_token');
        //$input['password'] = md5($input['password']);

        $request = User::create($input);
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

    //删除user
    public function del($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            $data = [
              'status' => 0,
              'message' => '成功'
            ];
        }else{
            $data = [
                'status' => -1,
                'message' => '删除失败'
            ];
        }
        return $data;
    }

}
