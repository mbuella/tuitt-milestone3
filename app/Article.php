<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    function __construct($title = '',$content = '') {
    	$this->title = $title;
    	$this->content = $content;
    }
}
