<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
            'password' => $request->input('password'),
            'avatar_path' => $profile_image_url,
            'back_path' => $back_image_url
            ]);

        return view('main');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
