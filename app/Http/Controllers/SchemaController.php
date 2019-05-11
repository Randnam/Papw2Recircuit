<?php

namespace App\Http\Controllers;

use App\design;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $designs = DB::table('designs')
        ->join('users','users.id', '=', 'designs.idUser')
        ->orderBy('designs.created_at', 'desc')
        ->select('users.id as userid', 'users.username',
                'designs.id', 'designs.title',
                'designs.difficulty', 'designs.thumb_path')
        ->limit(12)
        ->get();




        return view('main', compact('designs'));
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

         $videoImage = $request->file('video_path');
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

        $design = $designR[0];

        $deslikes = DB::table('deslikes')
        ->where('deslikes.idDesign', '=', $id)
        ->count();


        return view('schema', compact('design','deslikes'));

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
