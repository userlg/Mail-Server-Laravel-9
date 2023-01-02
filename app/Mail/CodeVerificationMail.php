<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CodeVerificationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    public $subject;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($information)
    {
        $this->subject = $information['title'];

        $this->data = $information;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verification');
    }
}
