<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\YoutubeVideosModel;

class VideoSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $video_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(YoutubeVideosModel $video_id)
    {
        //
        $this->video_id = $video_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
