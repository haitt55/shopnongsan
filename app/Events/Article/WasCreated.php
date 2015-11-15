<?php

namespace App\Events\Article;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Article;

class WasCreated extends Event
{
    use SerializesModels;

    public $article;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
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
