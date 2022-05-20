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
        $data = $request->all();
        $rules = [
            'username' => 'required|between:4,18',
            'password' => 'required|between:4,18|alpha_dash'
        ];
        $messages = [
            'username.required' => ':attribute 必须输入',
            'username.between' => ':attribute 长度4-18位',
            'password.required' => ':attribute 必须输入',
            'password.between' => ':attribute 长度4-18位',
        ];
        $customAttribute = [
            'username' => '用户名',
            'password' => '密码'
        ];
        //验证规则
        $validator = Validator::make($data, $rules, $messages, $customAttribute);

        $errors = $validator->errors();

        if ($validator->fails()) {
            $msg = $errors->first('username') ?: $errors->first('password');
            return [
                'data' => null,
                'success' => false,
                'message' => $msg
            ];
        } else {
            return [
                'data' => null,
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
