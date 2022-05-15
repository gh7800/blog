<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //加载首页view
    function homePage(){
        return view('components.home');
    }
}
