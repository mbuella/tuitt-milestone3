<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text'
    ];


    //
    public function users() {    	
        return $this->belongsToMany('App\User')
    	->withPivot('hearted', 'bookmarked')
    	->withTimestamps();
    }
    public function story() {
    	return $this->belongsTo('App\Story');
    }
    public function getUrl() {
        $story = $this->story;
    	$chapter = $this->id;

        return action('StoryController@index', [
        	'story_slug' => "$story->id-$story->title_slug",
        	'chapter' => $chapter
        	]
    	);
    }
    public function getPrevChapUrl() {
    	//get previous sort_id
    	$prev_sort_id = $this->sort_id - 1;
    	//return false if it returns 0
    	if ($prev_sort_id < 1)
    		return false;
    	return $this->story->chapters
    	                  ->where('sort_id', $prev_sort_id)
    	                  ->first()
    	                  ->getUrl();
    }
    public function getNextChapUrl() {    	
    	//get next sort_id
    	$next_sort_id = $this->sort_id + 1;
    	//get total number of rows
    	$row_count = $this->story->chapters->count();
    	//return false if it returns > $row_count
    	if ($next_sort_id > $row_count)
    		return false;
    	return $this->story->chapters
    	                  ->where('sort_id', $next_sort_id)
    	                  ->first()
    	                  ->getUrl();
    }
}
