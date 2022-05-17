<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as ApiController;

class AuthController extends ApiController
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
