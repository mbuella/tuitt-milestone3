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
    	$post_url = $chapter->getUrl() . '/save';

    	return view('chapter.modal',
    		compact('chapter','modal_title','btn_text','post_url')
		);
    }


    public function chapterAddModal($story_slug, $chapter_id = null) {
    	//get story
    	$story = $this->getStory($story_slug);

    	//get chapter
    	$chapter = $this->getChapter($story,$chapter_id);   

    	//test if the user is authorized to delete the chapter
    	$this->authorize('delete', $chapter); 	

    	$modal_title = 'Create New Chapter';
    	$post_url = $chapter->getUrl() . '/insert';

    	return view('chapter.modal',
    		compact('modal_title','post_url')
		);
    }

    public function insertChapter($story_slug, $chapter_id = null, Request $request) {
		//get story
    	$story = $this->getStory($story_slug);

    	//get chapter
    	$chapter = $this->getChapter($story,$chapter_id); 

    	//test if the user is authorized to update the chapter
    	$this->authorize('update', $chapter); 	   

    	//new chapter sort id (insert after the current chapter)
    	$new_chap_sid = $chapter->sort_id + 1;
    	//push the new sort id to array and make a new Chapter instance
    	$new_chapter_raw = array_add($request->chapter,'sort_id',$new_chap_sid);
    	$new_chapter = new Chapter($new_chapter_raw);

    	//filter chapters having sort_ids more than or equal
    	//to current sort id and increase their sort ids by one
    	$reord_chaps = $story->chapters
    							->filter(function ($value) use($new_chap_sid) {
								    return $value->sort_id >= $new_chap_sid;
								})
								->map(function ($item) {
									//increment sort_id by one
									$item->sort_id += 1;
								    return $item;
								})
								->all();

		//save updated chapters to database
		$story->chapters()
			  ->saveMany($reord_chaps);
		//then add the new chapter
		$story->chapters()->save($new_chapter);

    	//redirect to the newly-created chapter
    	return redirect($new_chapter->getUrl());
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
    	//and decrease their sort ids by one
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
