<?php

namespace App\Listeners;


use App\Events\VideoSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVideoSavedNotification
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
     * @param  VideoSaved  $event
     * @return void
     */
    public function handle(VideoSaved $event)
    {
        //
    }
}
