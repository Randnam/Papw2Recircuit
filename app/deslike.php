<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deslike extends Model
{
    //
        public function design()
    {
        return $this->belongsTo('App\design');
    }

    

}
