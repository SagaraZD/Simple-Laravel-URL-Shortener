<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    protected $fillable = array('url', 'code');


    //Relationship
  	public function hit(){
    	return $this->hasMany('App\hit');
  }
}
