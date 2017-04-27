<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Author extends Model
{
    protected $fillable = [
        'pen_name', 'avatar', 'user_id'
    ];

    //
    public function stories() {
    	return $this->hasMany('App\Story');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function getAvatar() {
    	return Storage::url("avatars/authors/$this->avatar");
    }
}
