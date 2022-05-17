<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as FrontendController;

class IndexController extends FrontendController
{
    function index(){
        return view('index');
    }
}
