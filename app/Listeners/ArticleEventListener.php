<?php

namespace App\Listeners;

class ArticleEventListener
{
    public function onCreated($event)
    {
        flash()->success('Success!', 'Article successfully created.');
    }

    public function onUpdated($event)
    {
        flash()->success('Success!', 'Article successfully updated.');
    }

    public function onDeleted($event)
    {
        flash()->success('Success!', 'Article successfully deleted.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Article\WasCreated',
            'App\Listeners\ArticleEventListener@onCreated'
        );
        $events->listen(
            'App\Events\Article\WasUpdated',
            'App\Listeners\ArticleEventListener@onUpdated'
        );
        $events->listen(
            'App\Events\Article\WasDeleted',
            'App\Listeners\ArticleEventListener@onDeleted'
        );
    }
}
