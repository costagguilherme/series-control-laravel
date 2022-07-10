<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsersCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = 'Seja bem-vindo, ' . $name . ' !!';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}
