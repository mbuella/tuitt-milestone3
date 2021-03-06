<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_pword',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_pword', 'remember_token',
    ];

    public function member() {
        return $this->hasOne('App\Member');
    }

    public function authors() {
        return $this->hasMany('App\Author');
    }

    public function stories() {
        return $this->hasManyThrough('App\Story','App\Author');
    }
    
    /***
        We need to rename getAuthPassword()
        ->user_pword to user_pword, the 
        actual name in the USER table 
    ***/
    public function getAuthPassword() {
        return $this->user_pword;
    }
}
