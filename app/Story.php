<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'title_slug', 'intro',
        'cover_filename', 'genre_id', 'author_id'
    ];

    //cover image dimensions
    private static $cover_dimensions = [
        'min_width' => 200,
        'max_width' => 400,
        'min_height' => 200,
        'max_height' => 500
    ];

    public static function coverDimensions() {
        return self::$cover_dimensions;
    }

    public static function getStoryFromSlug($story_slug) {
        $story_id = strtok($story_slug, '-');
        return self::find($story_id);
    }

    public function getUrl() {
        return url("story/$this->id");
    }

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
        // dd($this->chapters);
        foreach ($this->chapters as $chapter) {
            $count += $chapter->view_count;
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

    public function getCover() {
        return asset(Storage::url("covers/$this->cover_filename"));
    }
}
