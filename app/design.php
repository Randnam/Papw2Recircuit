<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    //

    protected $fillable = ['title', 'description' , 'difficulty'
    'thumb_path', 'img_path_one', 'img_path_two', 'img_path_three' ,
    'video_path', 'idUser'
    ];

    public user(){

    	return this->hasOne('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }

    public function deslike()
    {
        return $this->hasMany('App\deslike');
    }
    
}
