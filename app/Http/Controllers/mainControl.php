<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainControl extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('main');
    }

    public function land(){
        return view('land');
    }

    public function profile(){

        return view('profile');
    }

    public function settings(){

        return view('settings');
    }

     public function schema(){

        return view('schema');
    }

     public function cschema(){

        return view('cschema');
    }

     public function mschema(){

        return view('mschema');
    }

     public function search(){

        return view('search');
    }

    public function admin(){
        return view('admin');
    }

}
