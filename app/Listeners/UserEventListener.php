<?php

namespace App\Listeners;

class UserEventListener
{
    public function onCreated($event)
    {
        flash()->success('Success!', 'User successfully created.');
    }

    public function onUpdated($event)
    {
        flash()->success('Success!', 'User successfully updated.');
    }

    public function onDeleted($event)
    {
        flash()->success('Success!', 'User successfully deleted.');
    }

    public function onUpdatedProfile($event)
    {
        flash()->success('Success!', 'Profile successfully updated.');
    }

    public function onUpdatedProfilePassword($event)
    {
        flash()->success('Success!', 'Password successfully updated.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\User\WasCreated',
            'App\Listeners\UserEventListener@onCreated'
        );
        $events->listen(
            'App\Events\User\WasUpdated',
            'App\Listeners\UserEventListener@onUpdated'
        );
        $events->listen(
            'App\Events\User\WasDeleted',
            'App\Listeners\UserEventListener@onDeleted'
        );
        $events->listen(
            'App\Events\User\ProfileWasUpdated',
            'App\Listeners\UserEventListener@onUpdatedProfile'
        );
        $events->listen(
            'App\Events\User\ProfilePasswordWasUpdated',
            'App\Listeners\UserEventListener@onUpdatedProfilePassword'
        );
    }
}
