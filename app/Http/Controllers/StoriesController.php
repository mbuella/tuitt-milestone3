<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
{
	//private properties
	private $genre;
	private $stories;


    function index() {
    	//return the story genres
    	return view('genres');
    }

    function getStories($genre_name) {
    	//get the requested genre object from database
    	$this->genre = Genre::where('genre_slug', $genre_name)
    				  ->first();

    	//get all the stories with the genres
    	$this->stories = \App\Story::where('genre_id',$this->genre->id)
    				 //->has('chapters')
    				 ->get();

    	return view('stories')->with(
    		[
    			'genre' => $this->genre,
    			'stories' => $this->stories
    		]
		);
    }
}
