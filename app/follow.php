<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    //
	protected $table = 'follows';

	protected $fillable = [
	'idUserOne', 'idUserTwo'
	];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
