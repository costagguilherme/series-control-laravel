<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogNewUser
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
     * @param  \App\Events\NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        Log::info("Usuário :: {$event->email} - {$event->name} ::  criado com sucesso");
    }
}
