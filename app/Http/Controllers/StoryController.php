<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Story;
use App\Genre;
use App\Author;
use App\Events\ChapterViewed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class StoryController extends Controller
{
	//private properties
	private $text_length;

	private function nl2p($text) {
		$pText = "";
		//get the first fragment of the string
		$paragraph = strtok($text, "\n");
		//continue adding p tags until
		//the last fragment is found
		while($paragraph !== false) {
			if (strlen($paragraph) >= 1 && $paragraph !== "")
				$pText .= \HTML::tag("p",$paragraph);
			$paragraph = strtok("\n");
		}
		return $pText;
	}

    public function index($story_slug, $chapter = null) {
    	//set max length of each paragraph
    	$this->text_length = 800;
    	//no chapter title
    	$chap_title = "No chapter here";

    	//get story id
    	$story_id = strtok($story_slug, '-');

    	//set the current story
    	$story = Story::find($story_id);

		//story cover
		$story_cover = asset("storage/covers/$story->cover_filename");

    	//get chapters of the story (sorted)
    	$chapters = $story->chapters
    					  ->sortBy('sort_id');

    	//if the story has chapters
    	if ($chapters->isNotEmpty()) {
	    	//set the current chapter
	    	if(is_null($chapter))
	    		$curr_chapter = $chapters->first();
	    	else
		    	//chapter id is the id itself
		    	$curr_chapter = $chapters->find($chapter);

	    	//owner view doesn't need to be recorded
			if (!Auth::check() || !Auth::user()->can('update-chapter', $curr_chapter)) {
		    	//fire chapter read listener
				event(new ChapterViewed($curr_chapter));
			}

			//chapter text nl2br
			$chap_p = $this->nl2p($curr_chapter->text);
			//current chapter num
			$chap_num = $curr_chapter->sort_id;
			//paginate text
			$text_arr = str_split($curr_chapter->text,$this->text_length);
			$text_pgn = new LengthAwarePaginator(
				$text_arr,
				count($text_arr),
				1 //one array per page
			);
			$text_pgn->withPath("");
			//chapter text nl2br
			$page = Input::get('page',1);
			$chap_p = $this->nl2p($text_pgn->items()[$page-1]);

			$chap_title = $curr_chapter->title;
    	}

		//get stories written by the author of the story
	   	$author_stories = $story->author->stories
	   							->take(5) //limit to first 5 per page
	   							->whereNotIn('id', [$story->id])
	   							//exclude stories which don't have chapters
	   							->filter(
	   								function($s) {
	   									return $s->has('chapters')->count() > 0;
	   								}
   								)
	   							->shuffle()
	   							->all();

		//get stories with the same genre
		$genre_stories = $story->genre->stories
	   						->take(5) //limit to first 5 per page
	   						->whereNotIn('id', [$story->genre->id])
	   							//exclude stories which don't have chapters
   							->filter(
   								function($s) {
   									return $s->has('chapters')->count() > 0;
   								}
							)
	   						->shuffle()
	   						->all(); 

	   	//return
		return view('story',compact(
				'story','chapters',
				'curr_chapter','chap_p',
				'story_cover','author_stories',
				'chap_num','text_pgn',
				'story_slug','chap_title',
				'genre_stories'
			));
	}

    public function storyAddModal() {    	
        $genres = Genre::all();
        $authors = Author::where('user_id',Auth::id())->get();


        $modal_title = 'Add New Story';
        $post_url = action('StoryController@storyAdd');

        return view('story.modal',
            compact(
            	'modal_title','post_url',
            	'genres','authors'
            )
        );
    }

    public function storyUpdateModal($story_slug) {
        //get story from slug
        $story = Story::getStoryFromSlug($story_slug);
        $genres = Genre::all();
        $authors = $story->author->user->authors;

        $modal_title = 'Edit Story';
        $post_url = action('StoryController@storyUpdate', [
        	'story' => $story
    	]);

        return view('story.modal',
            compact(
            	'story','modal_title','post_url',
            	'genres','authors'
            )
        );
    }

    public function storyAdd(Request $request) {
    	//create new instance of story
    	$story = new Story($request['story']);

		//save the new image to the disk
		//and replace cover_filename with the new filename
		$story->cover_filename =
			basename(
    			$request->story['cover_filename']
    					->store('covers','public')
			);

    	//save story
    	$add = $story->save();

    	//redirect to the new story
    	return redirect($story->getUrl());
    }

    public function storyUpdate(Story $story,Request $request) {
    	$updated_story = $request->story;

    	/* COVER IMAGE */
    	//if cover image is null
    	if($request->hasFile('story')) {
    		//delete the old image
    		Storage::disk('public')->delete("covers/{$story->cover_filename}");
    		//save the new image to the disk
    		//and replace cover_filename with the new filename
    		$updated_story['cover_filename'] =
    			basename(
	    			$request->story['cover_filename']
	    					->store('covers','public')
				);
    	}

    	//save the updates
    	$story->update($updated_story);

    	return redirect('/home#trending-stories');
    }

    public function storyDelete(Story $story) {
		/*** DELETION ***/

		//delete story cover
		Storage::disk('public')->delete("covers/{$story->cover_filename}");

    	//delete story
    	$delete = $story->delete();

    	/*** RESPONSE TO CLIENT ***/

    	if($delete) {
	    	$response = [
			    'status' => 'success',
			    'story_id' => $story->id
			];
    	}
    	else {
    		$response = [
			    'status' => 'failure',
			    'msg' => 'An error has occured, the story was not deleted.'
			];	
    	}

    	return response()->json($response);
    }
}
