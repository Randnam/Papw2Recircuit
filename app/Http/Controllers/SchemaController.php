<?php

namespace App\Http\Controllers;

use App\design;
use App\User;
use App\comment;
use App\deslike;
use App\comlike;
use App\desreport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        $designs = DB::select('call getMostRecent');

        $liked = DB::select('call getMostLiked');

        $likedFifthteen = DB::select('call getMostLikedFifthteenDays');


        if(isset(auth()->user()->id)){

            $fromFollows = DB::select('call getRecentFollows(?)', [auth()->user()->id]);

            $mostLikedFollow = DB::select('call getMostFollowLiked(?)', [auth()->user()->id]);

            return view('main', compact('designs','liked','fromFollows','mostLikedFollow','likedFifthteen'));

        }




        return view('main', compact('designs','liked','likedFifthteen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cschema');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(), [
        'title' => 'required|string',
        'description' => 'required|string',
        'difficulty' => 'required|integer',
        ]);

        //'title', 'description' , 'difficulty', 'thumb_path', 'img_path_one', 'img_path_two', 'img_path_three' , 'video_path', 'idUser' Good god help us all
        $videoImage = $request->file('video_path');

        if($videoImage->getClientOriginalExtension() != "mp4"){
            return back()->withErrors(['video_path' => 'Este no es un formato valido mp4'])
            ->withInput(input::all());
        }


         $thumbImage = $request->file('thumb_path');
         $thumbImageSaveAsName = time() .  "-thumb." . $thumbImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $thumb_image_url = $upload_path . $thumbImageSaveAsName;
         $success = $thumbImage->move($upload_path, $thumbImageSaveAsName);

         $img_Image_one = $request->file('img_path_one');
         $img_Image_oneSaveAsName = time() .  "-img_one." . $img_Image_one->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_one_url = $upload_path . $img_Image_oneSaveAsName;
         $success = $img_Image_one->move($upload_path, $img_Image_oneSaveAsName);

         $img_Image_two = $request->file('img_path_two');
         $img_Image_twoSaveAsName = time() .  "-img_two." . $img_Image_two->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_two_url = $upload_path . $img_Image_twoSaveAsName;
         $success = $img_Image_two->move($upload_path, $img_Image_twoSaveAsName);

         $img_Image_three = $request->file('img_path_three');
         $img_Image_threeSaveAsName = time() .  "-img_three." . $img_Image_three->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_three_url = $upload_path . $img_Image_threeSaveAsName;
         $success = $img_Image_three->move($upload_path, $img_Image_threeSaveAsName);

         
         $videoImageSaveAsName = time() .  "-video." . $videoImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $video_image_url = $upload_path . $videoImageSaveAsName;
         $success = $videoImage->move($upload_path, $videoImageSaveAsName);

         $design = design::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'difficulty' => $data['difficulty'],
            'thumb_path' => $thumb_image_url,
            'img_path_one' => $img_image_one_url,
            'img_path_two' => $img_image_two_url,
            'img_path_three' => $img_image_three_url,
            'video_path' => $video_image_url,
            'idUser' => auth()->user()->id
            ]);

         

          return redirect()->route('main');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $designR = DB::table('designs')
        ->join('users', 'users.id', '=', 'designs.idUser')
        ->select('designs.*','users.id as userid',
            'users.username')
        ->where('designs.id', '=', $id)
        ->get();


        if(!empty($designR[0])){

        $design = $designR[0];

        $deslikes = DB::table('deslikes')
        ->where('deslikes.idDesign', '=', $id)
        ->count();

        $secCheck = 0;

        if(isset(auth()->user()->id)){

        $secCheck = DB::table('deslikes')->where([
            ['idDesign', '=', $id],
            ['idUser', '=', auth()->user()->id]
            ])->count();
        }




        return view('schema', compact('design','deslikes','secCheck'));
        }else{

            return redirect()->route('main')->with('error', 'El diseño no existe');

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $designR = DB::table('designs')
        ->join('users', 'users.id', '=', 'designs.idUser')
        ->select('designs.*','users.id as userid',
            'users.username')
        ->where('designs.id', '=', $id)
        ->get();

        $design = $designR[0];

        if($design->userid != auth()->user()->id){

            return redirect()->route('main');
        }

        return view('mschema', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate(request(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'difficulty' => 'required|integer',
            ]);

        $chkthumb = false;
        $chkone = false;
        $chktwo = false;
        $chkthree = false;
        $chkvid = false;

        


        if(!empty($request->file('thumb_path'))){

         $thumbImage = $request->file('thumb_path');
         $thumbImageSaveAsName = time() .  "-thumb." . $thumbImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $thumb_image_url = $upload_path . $thumbImageSaveAsName;
         $success = $thumbImage->move($upload_path, $thumbImageSaveAsName);

            $chkthumb = true;

        }else{
            $chkthumb = false;
        
        }

        if(!empty($request->file('img_path_one'))){

         $img_Image_one = $request->file('img_path_one');
         $img_Image_oneSaveAsName = time() .  "-img_one." . $img_Image_one->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_one_url = $upload_path . $img_Image_oneSaveAsName;
         $success = $img_Image_one->move($upload_path, $img_Image_oneSaveAsName);

            $chkone = true;

        }else{
            $chkone = false;
        
        }

        if(!empty($request->file('img_path_two'))){

         $img_Image_two = $request->file('img_path_two');
         $img_Image_twoSaveAsName = time() .  "-img_two." . $img_Image_two->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_two_url = $upload_path . $img_Image_twoSaveAsName;
         $success = $img_Image_two->move($upload_path, $img_Image_twoSaveAsName);

            $chktwo = true;

        }else{
            $chktwo = false;
        
        }

        if(!empty($request->file('img_path_three'))){

         $img_Image_three = $request->file('img_path_three');
         $img_Image_threeSaveAsName = time() .  "-img_three." . $img_Image_three->getClientOriginalExtension();
         $upload_path = 'images/';
         $img_image_three_url = $upload_path . $img_Image_threeSaveAsName;
         $success = $img_Image_three->move($upload_path, $img_Image_threeSaveAsName);

            $chkthree = true;

        }else{
            $chkthree = false;
        
        }

        if(!empty($request->file('video_path'))){

         $videoImage = $request->file('video_path');
         $videoImageSaveAsName = time() .  "-video." . $videoImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $video_image_url = $upload_path . $videoImageSaveAsName;
         $success = $videoImage->move($upload_path, $videoImageSaveAsName);

            $chkvid = true;

        }else{
            $chkvid = false;
        
        }

        $apending = ['title' => $data['title'],
                    'description' => $data['description'],
                    'difficulty' => $data['difficulty']];

        if($chkthumb == true){

            $tmb = ['thumb_path' => $thumb_image_url];

           $apending = array_merge($apending,$tmb);
        }

        if($chkone == true){

            $one = ['img_path_one' => $img_image_one_url];

             $apending = array_merge($apending,$one);

        }

        if($chktwo == true){

            $two = ['img_path_two' => $img_image_two_url];

             $apending = array_merge($apending,$two);

        }

        if($chkthree == true){

            $three = ['img_path_two' => $img_image_three_url];

             $apending = array_merge($apending,$three);

        }

        if($chkvid == true){

            $vid = [ 'video_path' => $video_image_url];

              $apending = array_merge($apending,$vid);


        }



        $check = design::where('id', $id)->update($apending);

///////////////////////////////

        return redirect()->route('schema', ['id' => $id])->with('success', 'Modificado existosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $check = design::find($id);



        if($check->idUser == auth()->user()->id){
         DB::select('call PurgeDesign(?)',[$id]);

         return redirect()->route('profile', ['id' => auth()->user()->id])->with('success', 'Eliminado existosamente');

        }else{

            return redirect()->route('main')->with('error', 'Acceso no autorizado'); 
        }

       
    }

    //idUser, idComment, idDesign, content

    public function likeDesign(Request $request){

       $secCheck = DB::table('deslikes')->where([
        ['idUser', '=', $request->idUser],
        ['idDesign', '=', $request->idDesign]
        ])->count();

        $likes = 0;
        
        if($secCheck == 0 || empty($secCheck)){

            deslike::create([
                'idUser' => $request->idUser,
                'idDesign' => $request->idDesign
                ]);

            $likes = DB::table('deslikes')->where('idDesign', '=', $request->idDesign)->count();

        }else{

            $likes = DB::table('deslikes')->where('idDesign', '=', $request->idDesign)->count();
        }



        return $likes;


    }

    public function dislikeDesign(Request $request){

         deslike::where([
            ['idUser', '=', $request->idUser],
            ['idDesign', '=', $request->idDesign]
            ])->delete();

        $likes = DB::table('deslikes')->where('idDesign', '=', $request->idDesign)->count();

        return $likes;

    }

    public function comment(Request $request){

        $info = $this->validate(request(),
        ['title' => 'required|string',
         'content' => 'required|string'
        ]);

        if(!empty($info)){

        comment::create([
            'title' => $request->title,
            'content' => $request->content,
            'idUser' => $request->idUser,
            'idDesign' => $request->idDesign
            ]);

        }

        $oof = comment::where('idDesign', '=', $request->idDesign)->get();

        return $oof;

    }

    public function getComment(Request $request){

        $num = $request->idDesign;

        $cList = DB::select('call getComments(?)', [$num]);

        $dataArray = [];

        foreach ($cList as $cL) {

            $userType = "Usuario";


            $deslikes = 0;
            if(isset( auth()->user()->id)){
             $deslikes = DB::table('comlikes')
            ->where([['comlikes.idUser', '=', auth()->user()->id],
                ['comlikes.id', '=', $cL->id]])
            ->count();
            }

            if($cL->is_admin == "Si"){
               $userType =  "Administrador";
                }else{
                $userType =  "Usuario";
                }

            # code...
            $dataAdder = "<div class=\"card-body d-inline-block comCard \">
                        <div class=\"card col-md-3 d-inline-block\">
                        <div class=\"card-body text-center\">
                
                         <a class=\"text-sub-3 mx-auto\" href=\"".route('profile', ['id' => $cL->idUser])."\" > <img class=\"w-100\" src=\"". asset($cL->avatar_path) . "\"></a>      
                        <a class=\"text-sub-3 mx-auto\" href=\"".route('profile', ['id' => $cL->idUser])."\" >". $cL->username ."</a>
                        <p class=\"text-sub-3 mx-auto bold\">".
                        $userType
                        ."</p>
                        
                        </div>

                        </div>

                        <div class=\"card container-fluid px-0\">
                            <div class=\"card-header text-sub-2\"><b>".$cL->title ."</b>
                            <p class=\"float-right\"><b>". $cL->likes ."</b> Me gusta</p>
                            </div>
                            <div class=\"card-body\">
                                <p class=\"text-sub-3\">".
                                $cL->content
                                ."</p>
                            </div>
                            <div class=\"card-footer text-muted d-inline-block\">
                            
                            <p class=\"mb-0 w-75 bold\">Publicado el ". $cL->created_at."</p>";

                            if (isset(auth()->user()->id)){
                            if(auth()->user()->id != $cL->idUser){

                            if($deslikes == 1){

                            }else{
                            $dataAdder = $dataAdder . "<button class=\"btn btn-primary bnw w-25 likeCom\">
                            <img  src=\"".asset('imgs/like.png')."\">Me gusta</button>                            
                            <input type=\"hidden\" class=\"likCom\" name=\"likCom\" value=\"".$cL->id."\">";
                            }


                            }else{
                            $dataAdder = $dataAdder . "<button class=\"btn btn-danger rnw w-25 ml-1 float-right deleteCom\">
                            <img  src=\"".asset('imgs/garbage.png')."\"> Borrar</button>
                            <input type=\"hidden\" class=\"delCom\" name=\"delCom\" value=\"".$cL->id."\">";
                            }

                            }
                            $dataAdder = $dataAdder . "</div>
                        </div>

                    </div>";

            array_push($dataArray, $dataAdder);

        }


        return $dataArray;

    }

    public function deleteComment(Request $request){

        comlike::where([
            ['idComment', '=', $request->idComment]
            ])->delete();

        comment::where([
            ['idUser', '=', $request->idUser],
            ['id', '=', $request->idComment]
            ])->delete();


        return "complete";

    }

    public function likeComment(Request $request){

        comlike::create(["idUser" => $request->idUser,
            "idComment" => $request->idComment]);

        return "complete";
    }

    public function reportDesign(Request $request){

        

        desreport::create([
            "reason"=> $request->idReason,
            "idUser" => auth()->user()->id,
            "idDesign" => $request->idDesign
            ]);


        return "ok";
    }



    ///////////////////
}
