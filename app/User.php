<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

     protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','username', 'email', 'password',
        'avatar_path', 'back_path', 'about_me'
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName(){
        return 'id';
    }



    public function follow()
    {
        return $this->hasMany('App\follow');
    }

    public function role()
    {
        return $this->belongsToMany('App\role');
    }

    public function comlike(){
        return $this->hasMany('App\comlike');
    }

    public function deslike(){
        return $this->hasMany('App\deslike');
    }

}
