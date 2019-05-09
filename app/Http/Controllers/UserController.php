<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
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
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

         $profileImage = $request->file('avatar_path');
         $profileImageSaveAsName = time() .  "-profile." . $profileImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $profile_image_url = $upload_path . $profileImageSaveAsName;
          $success = $profileImage->move($upload_path, $profileImageSaveAsName);

         $backImage = $request->file('back_path');
         $backImageSaveAsName = time() .  "-back." . $backImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $back_image_url = $upload_path . $backImageSaveAsName;
          $success = $backImage->move($upload_path, $backImageSaveAsName);


        
        User::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar_path' => $profile_image_url,
            'back_path' => $back_image_url,
            'about_me' => "Hola soy nuevo",
            'is_admin' => "No"
            ]);

        return view('main');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        return view('profile', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        if (isset(auth()->user()->id)) {
            # code...
             $user = User::find(auth()->user()->id);

            return view('settings', compact('user'));
        }else{
            return view('main');
        }
        
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $this->validate(request(),
            ['name' => 'required|string',
             'last_name' => 'required|string',
             'about_me' => 'required|string']);

        $checkAvatar = false;
        $checkBack = false;

        if(!empty($request->file('avatar_path'))){

         $profileImage = $request->file('avatar_path');
         $profileImageSaveAsName = time() .  "-profile." . $profileImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $profile_image_url = $upload_path . $profileImageSaveAsName;
         $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $checkAvatar = true;

        }else{
            $checkAvatar = false;
        
        }

        if(!empty($request->file('back_path'))){

         $backImage = $request->file('back_path');
         $backImageSaveAsName = time() .  "-back." . $backImage->getClientOriginalExtension();
         $upload_path = 'images/';
         $back_image_url = $upload_path . $backImageSaveAsName;
         $success = $backImage->move($upload_path, $backImageSaveAsName);

            $checkBack = true;

        }else{
            $checkBack = false;
        
        }



        if($checkAvatar == true && $checkBack == true ){
            $check = User::where('id', auth()->user()->id)->update(
                ['name' => $data['name'],
                 'last_name' =>$data['last_name'],
                 'about_me' => $data['about_me'],
                 'avatar_path' => $profile_image_url,
                 'back_path' => $back_image_url
                 ]);

        }elseif ($checkAvatar == true && $checkBack == false ) {
                $check = User::where('id', auth()->user()->id)->update(
                ['name' => $data['name'],
                 'last_name' =>$data['last_name'],
                 'about_me' => $data['about_me'],
                 'avatar_path' => $profile_image_url
                 ]);


        }elseif ($checkAvatar == false && $checkBack == true ) {
                $check = User::where('id', auth()->user()->id)->update(
                ['name' => $data['name'],
                 'last_name' =>$data['last_name'],
                 'about_me' => $data['about_me'],
                 'back_path' => $back_image_url
                 ]);
        }else{
            $check = User::where('id', auth()->user()->id)->update(
                ['name' => $data['name'],
                 'last_name' =>$data['last_name'],
                 'about_me' => $data['about_me']]);
        }

        if($check == 1){

            return redirect()->route('profile', ['id' => auth()->user()->id])->with('success', 'Modificado existosamente');
        }




        return back()
        ->withErrors(['name'=> trans('auth.filled')])
        ->withInput(request(['name','last_name','about_me']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
