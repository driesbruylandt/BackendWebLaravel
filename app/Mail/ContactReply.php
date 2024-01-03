<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $reply;

    public function __construct($user, $reply)
    {
        $this->user = $user;
        $this->reply = $reply;
    }

    public function build()
    {
        return $this->view('emails.contact_reply')
                    ->subject('Your Message Reply');
    }
}