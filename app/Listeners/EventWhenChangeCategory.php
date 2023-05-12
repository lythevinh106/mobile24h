<?php

namespace App\Listeners;

use App\Events\TriggerChangeCategory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class EventWhenChangeCategory
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
     * @param  \App\Events\TriggerChangeCategory  $event
     * @return void
     */
    public function handle(TriggerChangeCategory $event)
    {

        if (Redis::exists('categories')) {

            Redis::del('categories');
        }
    }
}
