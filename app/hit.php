<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hit extends Model
{

  // Relationship
  public function link(){
    return $this->belongsTo('App\link');
  }
}
