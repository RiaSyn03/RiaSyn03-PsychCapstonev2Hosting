<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeclineMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $from_name = "Counselor";
        $from_email = "psychchare2.0@gmail.com";
        $subject = "Reschedule";
        return $this->from($from_email, $from_name)
        ->view('admin.users.councilour.email-template')
        ->subject($subject);
    }
}
