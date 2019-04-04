<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    //

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
