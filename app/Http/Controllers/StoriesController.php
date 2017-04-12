<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
{
    function index() {
    	//return the story genres
    	return view('genres');
    }

    function getStories($genre_name) {
    	//get the requested genre object from database
    	$genre = Genre::where('genre_slug', $genre_name)->first();
    	//get all the stories with the genres
    	$stories = $genre->stories;

    	//$fnm = $stories->first()->cover_filename;

    	//return redirect(asset(Storage::url("covers/{$fnm}")));
    	return view('stories',compact('stories','genre'));
    }
}
