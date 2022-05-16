<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function login(): array
    {
        return [
            'data' => 'login'
        ];
    }

    public function info(): array
    {
        return [
            'data' => 'info'
        ];
    }
}
