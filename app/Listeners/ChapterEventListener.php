<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterEventListener { 

    /**
     * Handle chapter view events. 
     */ 
    public function onChapterView($event) {
        $chap_id = $event->chapter->id;

        // Check if chapter session key exists
        // If not, update view_count and add the chap id
        if (!session('chap_id_list') || Auth::check()) {
            session([ 'chap_id_list' => [] ]);
        }
        //check if the chap_id exists in chap_id_list
        //Add if not
        if(!in_array($chap_id,session('chap_id_list'))) {
            $chap_id_list = session('chap_id_list');
            //add the chap id to array
            array_push(
                $chap_id_list,$chap_id
            );
            //add the chap_id in chap_id_list
            session(['chap_id_list' => $chap_id_list]);
            //increment view count of chapter
            $event->chapter->increment('view_count');
        }
    }

    /**
     * Handle chapter heart events. 
     */ 
    public function onChapterHeart($event) {}

    /**
     * Handle chapter bookmark events. 
     */ 
    public function onChapterBookmark($event) {}
    
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ChapterViewed',
            'App\Listeners\ChapterEventListener@onChapterView'
        );
    
        $events->listen(
            'App\Events\ChapterHearted',
            'App\Listeners\ChapterEventListener@onChapterHeart'
        );

        $events->listen(
            'App\Events\ChapterBookmarked',
            'App\Listeners\ChapterEventListener@onChapterBookmark'
        );
    }
}

?>