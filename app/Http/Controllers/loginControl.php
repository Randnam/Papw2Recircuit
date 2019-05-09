<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginControl extends Controller
{
    //

    public function loginCheck (Request $request){


    	 $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

    $credentials = $request->only('email','password');

   	if(Auth::attempt($credentials,false)){

   		return "Confirmed";
   	}else{
   		return "failed";
   	}



    	return "Checking";
    }
}
