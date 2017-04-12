<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class StoryController extends Controller
{
	//private properties
	private $chap_id;

    public function index($story_slug, $chapter = 1) {
    	//get story id
    	$story_id = strtok($story_slug, '-');

    	//set the current story
    	$story = Story::find($story_id);

    	//get chapters of the story (sorted)
    	$chapters = $story->chapters->sortBy('sort_id');

    	//set the current chapter
    	$this->chap_id = $chapter;
    	$curr_chapter = $chapters->filter(
    		function($item) {
		    	return $item->sort_id == $this->chap_id;
			}
		)->first();


    	echo "Story id: {$story->id}<br>";
    	echo "Story title: {$story->title}<br>";
    	echo "Story Author: {$story->author->pen_name}<br>";
    	echo "Story slug: $story_slug<br>";
    	echo "Story chapter: $chapter<br>";
    	dd($curr_chapter);


    	//$this->__getChapter(1);
	}
}
