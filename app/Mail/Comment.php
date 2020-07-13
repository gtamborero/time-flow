<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Exchanges;

class Comment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $exchange_id;
     public $theExchange;

     public function __construct($exchange_id)
     {
         $this->exchange_id = $exchange_id;
     }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->theExchange = Exchanges::where('id',$this->exchange_id)->first();
        return $this->markdown('emails.comment');
    }
}
