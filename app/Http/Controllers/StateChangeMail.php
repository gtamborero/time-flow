<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Exchanges;

class StateChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Exchanges $exchange)
     {
         $this->subject('[TimeFlow] - ' . $exchange);
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Exchanges $exchange)
    {
        return $this->view('mails.statusMail')
        ->with('exchange', $exchange);
    }
}
