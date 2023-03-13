<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SecondController extends Controller
{
    public function __construct(){
        $this -> middleware('auth')->except('ShowString2');
    }

    public function ShowString1(){
        return 'show string oneee';
    }

    public function ShowString2(){
        return 'show string twooo';
    }

    public function ShowString3(){
        return 'show string threee';
    }
}
