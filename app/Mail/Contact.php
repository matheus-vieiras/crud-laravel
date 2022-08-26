<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->from($this->user['email'], $this->user['name'])->subject($this->user['subject'])->view('emails.contact');
    }
}
