<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendPostEmails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        SendPostEmails::dispatch($event->post);
    }
}
