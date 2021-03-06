<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_fname', 'member_lname', 'member_addr',
        'member_dbirth', 'member_gender', 'avatar'
    ];

    public function getAvatar() {
    	return asset(Storage::url("avatars/members/$this->avatar"));
    }
}
