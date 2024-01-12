<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function credentials(Request $request){
        if(is_numeric($request->email)){
        return ['mobile'=>$request->email, 'password'=>$request->password];
        }elseif(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
        return ['email'=>$request->email, 'password'=>$request->password];
        }
        }
}
