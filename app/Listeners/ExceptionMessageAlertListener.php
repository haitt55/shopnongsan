<?php

namespace App\Listeners;

use App\Events\ExceptionOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionMessageAlertListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExceptionOccurred  $event
     * @return void
     */
    public function handle(ExceptionOccurred $event)
    {
        flash()->error('Error!', $event->exception->getMessage());
    }
}
