<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // 
    public function author() {
    	return $this->belongsTo('App\Author');
    }
    public function chapters() {
    	return $this->hasMany('App\Chapter');
    }
}
