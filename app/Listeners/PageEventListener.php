<?php

namespace App\Listeners;

class PageEventListener
{
    public function onCreated($event)
    {
        flash()->success('Success!', 'Page successfully created.');
    }

    public function onUpdated($event)
    {
        flash()->success('Success!', 'Page successfully updated.');
    }

    public function onDeleted($event)
    {
        flash()->success('Success!', 'Page successfully deleted.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Page\WasCreated',
            'App\Listeners\PageEventListener@onCreated'
        );
        $events->listen(
            'App\Events\Page\WasUpdated',
            'App\Listeners\PageEventListener@onUpdated'
        );
        $events->listen(
            'App\Events\Page\WasDeleted',
            'App\Listeners\PageEventListener@onDeleted'
        );
    }
}
