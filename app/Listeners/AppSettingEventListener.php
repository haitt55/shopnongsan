<?php

namespace App\Listeners;

class AppSettingEventListener
{
    public function onUpdated($event)
    {
        flash()->success('Success!', 'App Settings successfully updated.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\AppSetting\WasUpdated',
            'App\Listeners\AppSettingEventListener@onUpdated'
        );
    }
}
