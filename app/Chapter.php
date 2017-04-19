<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    public function users() {    	
        return $this->belongsToMany('App\User')
    	->withPivot('hearted', 'bookmarked')
    	->withTimestamps();
    }
}
