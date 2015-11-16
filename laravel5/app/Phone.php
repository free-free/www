<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	protected $table='user_phone';
	public $timestamps=false;
    /**
      *
      *
      *
      *
      *
      */
    public function user(){
    	return $this->belongsTo('App\Eloquent','user_id');
    }


    public function users(){
    	return $this->belongsTo('App\Eloquent','user_id');
    }
}
