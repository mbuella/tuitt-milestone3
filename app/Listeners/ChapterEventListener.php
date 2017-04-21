<?php

namespace App\Listeners;

class ChapterEventListener { 

    /**
     * Handle chapter view events. 
     */ 
    public function onChapterView($event) {}

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