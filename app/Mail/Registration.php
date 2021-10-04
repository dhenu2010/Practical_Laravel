<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registration extends Mailable
{
    use Queueable, SerializesModels;
     public $details;
      public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
          $this->details = $details;
           $this->subject = $details['registration']['subject'];
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Registration')->subject($this->subject);
    }
}
