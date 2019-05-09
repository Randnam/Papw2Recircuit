<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{

    public function __construct(){

        $this->middleware('guest', ['only' => 'showlogin']);

    }

       public function showlogin()
    {
        return view('login');
    }

    public function login(){
        $cred =  $this->validate(request(), [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);


        if(Auth::attempt($cred)){
            return redirect()->route('main');
        }

        return back()
        ->withErrors(['email'=> trans('auth.failed')])
        ->withInput(request(['email']));

        }

}
