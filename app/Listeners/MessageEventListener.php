<?php

namespace App\Listeners;

class MessageEventListener
{
    public function onRead($event)
    {
        if ($event->message->unread) {
            $event->message->update(['unread' => false]);
        }
    }

    public function onDeleted($event)
    {
        flash()->success('Success!', 'Message successfully deleted.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Message\WasRead',
            'App\Listeners\MessageEventListener@onRead'
        );
        $events->listen(
            'App\Events\Message\WasDeleted',
            'App\Listeners\MessageEventListener@onDeleted'
        );
    }
}
