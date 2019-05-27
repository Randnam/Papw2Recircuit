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
             return redirect()->route('main');
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
      if(auth()->user()->is_admin == "Yes"){
        return view('admin');
      }
      else{
        return redirect()->route('main')->with('error', 'Acceso no autorizado');  
      }
    }

    public function getReports(Request $request)
    {

      $cList = DB::select('call GetReports()');

      $dataArray = [];

      $reas = " ";

      $toSearch = " ";

      foreach ($cList as $cL) {

         switch ($cL->reason) {
            case '1':
              $reas = "Contenido inapropiado";
              break;
            case '2':
               $reas = "Contenido ofensivo";
              break;        
            case '3':
               $reas = "Contenido de naturaleza sexual";
              break;
            case '4':
               $reas = "Contenido deceptivo o irrevelevante";
              break;                          
          }

         switch ($cL->difficulty) {
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

        $dataAdder = "<div class=\"card mb-1\">
          <div class=\"card-header\"> Reportado por: <b>".
          $reas
           ."</b> por <a href=\"".route('profile', ['id' => $cL->reportingId])."\">". $cL->reporting ."</a> el <b>". $cL->reportDate ."</b>
          </div>
          <div class=\"card-body d-flex justify-content-start\">

            <div class=\"card col-md-3\">
            <div class=\"card-body\">
            <a class=\"text-dark\" href=\"".route('schema', ['id' => $cL->id])."\">
            <img class=\"w-100\" src=\"". asset($cL->thumb_path) ."\">    
            </a>
            </div>

            </div>

            <div class=\"card container-fluid px-0\">
              <a class=\"text-dark\" href=\"".route('schema', ['id' => $cL->id])."\">
              <div class=\"card-header d-flex justify-content-around\"><b>". $cL->title ."</b>
              </a>
              <p class=\"w-75 ml-5 mb-0\"><b>".$cL->likes."</b> Me gusta</p></div>
              <div class=\"card-body\">
                <p class=\"text-sub-3\">
                ". $cL->description ."
                </p>
                <p class=\"text-sub-3\">
                Dificultad: <b>". $toSearch ."</b>

                </p>
              </div>
              
              <div class=\"card-footer text-muted d-flex justify-content-around\">
                <p class=\"mb-0 w-75\">Publicado el ". $cL->created_at ." por <a href=\"".route('profile', ['id' => $cL->reportedId])."\">".$cL->reported."</a></p>
                </div>
            </div>

          </div>
          <div class=\"card-footer text-muted d-flex justify-content-center\">
                <input type=\"hidden\" class=\"idRep\" name=\"idRep\" value=\"".$cL->desId."\">
                <input type=\"hidden\" class=\"idDes\" name=\"idDes\" value=\"".$cL->id."\">
                <button class=\"btn btn-danger dRep rnw mx-1\"><img src=\"" . asset('imgs/garbage.png'). "\">Eliminar Reporte</button>
                <button class=\"btn btn-danger dDes rnw float-right mx-1\"><img src=\"" . asset('imgs/garbage.png') ."\"> Eliminar diseño</button>
            </div>

          </div>";



        array_push($dataArray, $dataAdder);
        
      }

      return $dataArray;
    }

    public function deleteReport(Request $request)
    {
      $id = $request->idReport;

      DB::select('call PurgeReport(?)', [$id]);

      return "ok";

      
    }

    public function deleteDesign(Request $request){

      $id = $request->idDesign;

      DB::select('call PurgeDesign(?)',[$id]);

      return "ok";

    }

}
