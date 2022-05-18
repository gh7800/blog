<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function login(Request $request): array
    {
//        $input = $request->except('_token');
        $username = $request->input('username');
        $password = $request->input('password');

//        $username = $request['username'];
//        $password = $request['password'];
//        $user = User::find($username);
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
        $validator = Validator::make([$username,$password], $rule,$err);

        if($validator->fails()) {
            return [
                'data' => $username,
                'success' => false,
                'message' => $err
            ];
        }else{
            return [
                'data' => 'login',
                'success' => true,
                'message' => '登录成功'
            ];
        }
    }

    public function info(): array
    {
        return [
            'data' => 'info'
        ];
    }
}
