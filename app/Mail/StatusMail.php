<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Exchanges;
use Illuminate\Support\Facades\Auth;
use OneSignal;

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
      OneSignal::sendNotificationToExternalUser(
   "hi friend",
   Auth::user()->id,
   $url = null,
   $data = null,
   $buttons = null,
   $schedule = null
);

      if ($this->status === 0){
        $customMessage = __('Payment Request');
        $customMessageBody = __('Time-Flow is a Time Exchange System. Someone has send or requested time to you. Please Accept or Reject');
      }
      if ($this->status === 1){
        $customMessage = __('Payment Accepted');
        $customMessageBody = __('Congratulations') . " " .
          ucfirst($this->sellerName) . " " .
          __('and') . " " .
          ucfirst($this->buyerName) . "! " .
          __('Shortly') . " " .
          ucfirst($this->buyerName) . " " .
          __('will Rate / Comment this exchange');

      }
      if ( ($this->status === 1) && (isset($this->rating)) ){
        $customMessage = __('New Comment');
        $customMessageBody = ucfirst($this->buyerName) . " " .
          __('has made a comment / rating to') . " " .
          ucfirst($this->sellerName);
      }
      if ($this->status === -1){
        $customMessage = __('Rejected Payment');
        $customMessageBody = "";
      }
        return $this->subject('[' . config('app.name') . '] ' .
          $customMessage . " " .
          __('between') . " " .
          ucfirst($this->sellerName) . " " .
          __('and') . " " .
          ucfirst($this->buyerName)
        )
        ->markdown('emails.statusMail')
        ->with('customMessage', $customMessage)
        ->with('customMessageBody', $customMessageBody);
    }
}
