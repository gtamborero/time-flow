<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Exchanges;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sellerName;
    public $sellerMail;
    public $buyerName;
    public $buyerMail;
    public $creatorName;

    public $status;
    public $concept;
    public $amount;
    public $accepted_time;
    public $finished_time;
    public $cancelled_time;

    public $rating;
    public $comment;

    public function __construct($exchangeId)
    {
      $exchangeData = Exchanges::where('id', $exchangeId)->first();

      // USER names + mails
      $this->sellerName = $exchangeData->getSellerUser->name;
      $this->sellerMail = $exchangeData->getSellerUser->email;
      $this->buyerName = $exchangeData->getBuyerUser->name;
      $this->buyerMail = $exchangeData->getBuyerUser->email;
      $this->creatorName = $exchangeData->getCreatorUser->name;

      // Exchange info
      $this->status = $exchangeData->status;
      $this->concept = $exchangeData->concept;
      $this->amount = $exchangeData->amount;
      $this->accepted_time = $exchangeData->accepted_time;
      $this->finished_time = $exchangeData->finished_time;
      $this->cancelled_time = $exchangeData->cancelled_time;

      // Extra info
      if (isset($exchangeData->getRating))
      {
        $this->rating = $exchangeData->getRating->rating;
        $this->comment = $exchangeData->getRating->comment;
      }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      // Get user language for use in this mail
      //App::setLocale('es');

      if ($this->status === 0){
        $customMessage = __('New exchange');
      }
      if ($this->status === 1){
        $customMessage = __('Exchange Update');
      }
      if ($this->status === -1){
        $customMessage = __('Rejected Exchange');
      }
        return $this->subject('[' . config('app.name') . '] ' . $customMessage )
        ->markdown('emails.statusMail');
    }
}
