<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showAdminName(){
        return 'oussama mechtri' ;
    }

    public function getindex(){

        $obj = new \stdClass();
        $obj -> name= 'oussama';
        $obj -> id= 2;

        $data = ['oussama', 'sirine']; 
        return view('welcome', ['data'=>$data], ['obj'=>$obj] );//['obj'=>$obj]
    }
}
