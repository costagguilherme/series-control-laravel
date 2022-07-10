<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UsersCreatedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Events\NewUserEvent;

class SendMailForNewUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $user = $this->user::find($event->user_id);
        $email = new UsersCreatedMail(
            $event->name, 
            $event->email, 
        );
        Mail::to($user)->queue($email);
    }
}
