<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    
     // Relationship
		  public function connect_location(){
		    return $this->hasMany('App\connect_location');
		  }
}
