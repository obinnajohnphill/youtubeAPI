<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Superbalist\PubSub\PubSubAdapterInterface;

class YoutubeVideos extends Command
{
    /**
     * The name and signature of the subscriber command.
     *
     * @var string
     */
    protected $signature = 'youtube_videos';

    /**
     * The subscriber description.
     *
     * @var string
     */
    protected $description = 'Notification when video is saved into database';

    /**
     * @var PubSubAdapterInterface
     */
    protected $pubsub;

    /**
     * Create a new command instance.
     *
     * @param PubSubAdapterInterface $pubsub
     */
    public function __construct(PubSubAdapterInterface $pubsub)
    {
        parent::__construct();

        $this->pubsub = $pubsub;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dd($this->pubsub->subscribe('youtube_videos', function ($message) {

        }));
    }
}
