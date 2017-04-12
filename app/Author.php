<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function stories() {
    	return $this->hasMany('App\Stories');
    }
}
