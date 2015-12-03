<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SomeEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $content='hello';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.hello'];
    }
    /**
     * Get the broadcast event name.
     *
     *By default, the broadcast event name will be the fully
     *qualified class name of the event. Using the example 
     *class above, the broadcast event would be App\Events\ServerCreated.
     *You can customize this broadcast 
     *event name to whatever you want using the broadcastAs method:
     * @return string
     */
    public function broadcastAs()
    {
        return 'app.server-created';
    }

    /**
     * Get the data to broadcast.
     * if you wish to have even more fine-grained control over your 
     * broadcast payload, you may add a broadcastWith method to 
     * your event. This method should return the 
     * array of data that you wish to broadcast with the event
     * @return array
     */
    public function broadcastWith()
    {
        return ['user' => 12];
    }

}
