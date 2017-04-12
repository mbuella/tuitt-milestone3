<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // 
   public function stories() {
   		//dd($this->hasMany('App\Story'));
        return $this->hasMany('App\Story');
    }
}
