<?php

namespace App\Listeners;

use App\Events\BotClick;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BotClickListener
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
     * @param  \App\Events\BotClick  $event
     * @return void
     */
    public function handle(BotClick $event)
    {
        
        Session::put('bot_click_success', 'success');
    }
}
