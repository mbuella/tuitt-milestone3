<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Chapter;

class ChapterController extends Controller
{

	private $chapter;

    //
    public function delete($story_slug, $chapter_no = 1) {
    	//get story
    	$story_id = strtok($story_slug, '-');
    	$story = Story::find($story_id);

    	/*** PRE DELETE ***/

    	//get chapter
    	$this->chapter = $story->chapters
    					 ->where('sort_id',$chapter_no)
    					 ->first();

    	//Return a failure message if chapter not found
    	if(is_null($this->chapter)) {
    		return response()->json([
    			'status' => 'failure',
    			'msg' => "The chapter you're trying to delete does not exist."
			]);
    	}

    	//test if the user is authorize to delete the chapter
    	$this->authorize('delete', $this->chapter);

	
    	/*** RENUMBERING ***/

    	//filter chapters having sort_ids more than current sort id
    	//and reorder their sort ids
    	$reord_chaps = $story->chapters
    							->filter(function ($value) {
								    return $value->sort_id > $this->chapter->sort_id;
								})
								->map(function ($item) {
									$item->sort_id -= 1;
								    return $item;
								})
								->all();

		//save updated chapters to database
		$story->chapters()->saveMany($reord_chaps);
		$story->save();

		/*** DELETION ***/
    	//delete chapter
    	$delete = $this->chapter->delete();

    	/*** RESPONSE TO CLIENT ***/

    	if($delete) {
	    	$response = [
			    'status' => 'success',
			    'story_id' => $story_id,
			    'chapter_id' => $this->chapter->id
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
