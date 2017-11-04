<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class connect_location extends Model
{
   
    //Relationship
  	public function location(){
    	return $this->belongsTo('App\location');
  }
}
