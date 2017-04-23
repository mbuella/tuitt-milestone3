<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Chapter;

class ChapterController extends Controller
{
    //
    private function getStory($story_slug) {
    	$story_id = strtok($story_slug, '-');
    	return Story::find($story_id);
    }

    private function getChapter($story,$chapter_id = null) {
    	if(is_null($chapter_id)) {
	    	return $story->chapters
	    					 ->sortBy('sort_id')
	    					 ->first();    		
    	}
    	else {
	    	return $story->chapters
	    					 ->find($chapter_id);    		
    	}
    }

    public function chapterEditModal($story_slug, $chapter_id = null) {
    	//get story
    	$story = $this->getStory($story_slug);

    	//get chapter
    	$chapter = $this->getChapter($story,$chapter_id);   

    	//test if the user is authorized to delete the chapter
    	$this->authorize('delete', $chapter); 	

    	$modal_title = 'Edit Chapter';
    	$btn_text = 'Save Chapter';
    	$post_url = $chapter->getUrl() . '/save';

    	return view('chapter.modal',
    		compact('chapter','modal_title','btn_text','post_url')
		);
    }

    public function saveChapter($story_slug, $chapter_id = null, Request $request) {
    	//get story
    	$story = $this->getStory($story_slug);

    	//get chapter
    	$chapter = $this->getChapter($story,$chapter_id); 

    	//test if the user is authorized to update the chapter
    	$this->authorize('update', $chapter); 	

    	//update details from request
    	$updates = $request->chapter;

    	//save to database
    	$chapter->update($updates);

    	//redirect to the same page
    	return redirect($chapter->getUrl());
    }

    public function delete($story_slug, $chapter_id = null) {
    	//get story
    	$story = $this->getStory($story_slug);

    	/*** PRE DELETE ***/

    	//get chapter
    	$chapter = $this->getChapter($story,$chapter_id);

    	//Return a failure message if chapter not found
    	if(is_null($chapter)) {
    		return response()->json([
    			'status' => 'failure',
    			'msg' => "The chapter you're trying to delete does not exist."
			]);
    	}

    	//test if the user is authorize to delete the chapter
    	$this->authorize('delete', $chapter);

	
    	/*** RENUMBERING ***/

    	//filter chapters having sort_ids more than current sort id
    	//and reorder their sort ids
    	$reord_chaps = $story->chapters
    							->filter(function ($value) use($chapter) {
								    return $value->sort_id > $chapter->sort_id;
								})
								->map(function ($item) {
									//decrement sort_id by one
									$item->sort_id -= 1;
								    return $item;
								})
								->all();

		//save updated chapters to database
		$story->chapters()->saveMany($reord_chaps);
		$story->save();

		/*** DELETION ***/
    	//delete chapter
    	$delete = $chapter->delete();

    	/*** RESPONSE TO CLIENT ***/

    	if($delete) {
	    	$response = [
			    'status' => 'success',
			    'story_id' => $story->id,
			    'chapter_id' => $chapter->id
			];
    	}
    	else {
    		$response = [
			    'status' => 'failure',
			    'msg' => 'An error has occured, the chapter was not deleted.'
			];	
    	}

    	return response()->json($response);
    }
}
