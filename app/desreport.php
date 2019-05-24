<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desreport extends Model
{
    //

    protected $table = 'desreports';
    
	protected $fillable = ['reason','idDesign', 'idUser'];

}
