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

    public function onSent($event)
    {
        flash()->success('Success!', 'Message successfully sent.');
        // send notification email to admin
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
        $events->listen(
            'App\Events\Message\WasSent',
            'App\Listeners\MessageEventListener@onSent'
        );
    }
}
