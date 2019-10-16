<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $request){
    	$this->mail = $request;
    }
  

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Oglasavanje.com')
        			->from($this->mail->email)
        			->to('aleksadjuric23@gmail.com')
        			->view('mail.contact-mail');
    }
}
