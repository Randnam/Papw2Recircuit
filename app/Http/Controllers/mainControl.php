<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Design;

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
        if(isset(auth()->user()->id)){
            return view('main');
        }else{
        return view('land');
        }
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

    public function search(Request $request){

        $typeOfSearch = Input::get('philter');

        $toSearch = Input::get('toSearch');

        $StartDate = Input::get('dateStart');

        $EndDate = Input::get('dateEnd');

        $dificulty =Input::get('dificulty');


        switch ($typeOfSearch) {
            case 'user':
                
                $results = DB::select('call searchUserByName(?)', [$toSearch]);

                 return view('search',compact('results','typeOfSearch','toSearch'));

                break;

            case 'design':

                $results = DB::select('call searchDesignByTitle(?)', [$toSearch]);

                return view('search',compact('results','typeOfSearch','toSearch'));
                
                break;

            case 'date':

                $results = DB::select('call searchDesignByDate(?,?)', [$StartDate,$EndDate]);

                $toSearch = $StartDate . " a " . $EndDate;

                return view('search',compact('results','typeOfSearch','toSearch'));
                
                break;  

            case 'dificulty':
                   
                   $results = DB::select('call searchDesignByDifficulty(?)', [$dificulty]);

                   switch ($dificulty) {
                       case '1':
                           $toSearch = "Principiante";
                           break;
                       case '2':
                           $toSearch = "Avanzado";
                           break;
                       case '3':
                           $toSearch = "Experto";
                           break;
                       case '4':
                           $toSearch = "Imposible";
                           break;
                       default:
                           # code...
                           break;
                   }

                   return view('search',compact('results','typeOfSearch','toSearch'));

                   break;   

            default:
                return view('search')
                ->with('found', 'No se encontraron resultados');
                break;
        }


        

 
    }

    public function admin(){
        return view('admin');
    }

}
