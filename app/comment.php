<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    public function comlike()
    {
        return $this->hasMany('App\comlike');
    }

    public function design()
    {
        return $this->belongsTo('App\design');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
