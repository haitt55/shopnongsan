<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ExceptionOccurred' => [
            'App\Listeners\ExceptionMessageAlertListener',
        ],
    ];

    protected $subscribe = [
        'App\Listeners\AppSettingEventListener',
        'App\Listeners\ArticleEventListener',
        'App\Listeners\MessageEventListener',
        'App\Listeners\PageEventListener',
        'App\Listeners\UserEventListener',
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
