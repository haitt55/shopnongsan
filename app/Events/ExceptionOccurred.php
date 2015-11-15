<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Exception;

class ExceptionOccurred extends Event
{
    use SerializesModels;

    public $exception;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
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
