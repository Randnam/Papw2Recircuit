<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deslike extends Model
{
    //
	protected $fillable = [
	'idUser', 'idDesign'
	];

        public function design()
    {
        return $this->belongsTo('App\design');
    }

    

}
