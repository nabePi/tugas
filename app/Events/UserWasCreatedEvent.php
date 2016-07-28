<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserWasCreatedEvent extends Event
{
    use SerializesModels;

    public $user;
    public $is_admin;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $is_admin)
    {
        $this->user= $user;
        $this->is_admin = $is_admin;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
