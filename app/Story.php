<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // 
    public function author() {
    	return $this->belongsTo('App\Author');
    }
    public function genre() {
    	return $this->belongsTo('App\Genre');
    }
    public function chapters() {
    	return $this->hasMany('App\Chapter');
    }
    public function getTotalViews() {
        $count = 0;
        foreach ($this->chapters as $chapter) {
            $count += count($chapter->users);
        }
        return $count;
    }    
    public function getTotalHearts() {
        $count = 0;
        foreach ($this->chapters as $chapter) {
            //$count += $chapter->users->hearted->sum();
            foreach ($chapter->users as $user) {
                $count += $user->pivot->hearted;
            }
        }
        return $count;
    }
}
