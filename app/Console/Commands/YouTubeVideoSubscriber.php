<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Superbalist\PubSub\PubSubAdapterInterface;
use Superbalist\LaravelPubSub\PubSubConnectionFactory;
use App\Http\Controllers\SearchVideosController;

class YouTubeVideoSubscriber extends Command
{
    /**
     * The name and signature of the subscriber command.
     *
     * @var string
     */
    protected $signature = 'subscriber:name';

    /**
     * The subscriber description.
     *
     * @var string
     */
    protected $description = 'PubSub subscriber for ________';

    /**
     * @var PubSubAdapterInterface
     */
    protected $pubsub;


    protected $data;

    /**
     * Create a new command instance.
     *
     * @param PubSubAdapterInterface $pubsub
     */
   // public function __construct(PubSubAdapterInterface $pubsub)
    //{
    public function __construct(PubSubConnectionFactory $factory)
    {
        parent::__construct();

       // $this->pubsub = $pubsub;

        $config = config('pubsub.connections.kafka');
        $config['consumer_group_id'] = self::class;
        $this->pubsub = $factory->make('kafka', $config);

       // $this->data = new SearchVideosController();
       // $this->data = passData();

    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->pubsub->subscribe($this->data, function ($message) {

        });
    }
}
