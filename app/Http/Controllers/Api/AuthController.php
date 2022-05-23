<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as ApiController;
use App\Models\BlogUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Utils\EncryptionTool;

class AuthController extends ApiController
{
    public function login(Request $request): array
    {
        $data = $request->all();
        $username = $request->input("username");
        $password = $request->input("password");

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
            //在验证用户名、密码是否正确
            $user = BlogUser::where('username', $username)->first();

            if ($user) {
                $tool = new EncryptionTool();
                $pw = $tool->authCode($user->password,'DECODE','shine',100000);
                if($pw == $password) {
                    return [
                        'data' => $pw,
                        'success' => true,
                        'message' => '登录成功'
                    ];
                }else{
                    return [
                        'data' => $pw,
                        'success' => false,
                        'message' => '密码错误'
                    ];
                }
            } else {
                return [
                    'data' => null,
                    'success' => false,
                    'message' => '用户名不存在'
                ];
            }
        }
    }

    public function info(): array
    {
        return [
            'data' => 'info'
        ];
    }
}
