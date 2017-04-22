<?php

namespace App\Listeners;

use App\Events\ChapterViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateChapViewByUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChapterViewed  $event
     * @return void
     */
    public function handle(ChapterViewed $event)
    {
        //
    }
}
