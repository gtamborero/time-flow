<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\StatusMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Exchanges;

class SendMailProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $exchangeData = Exchanges::where('id', $this->id)->first();

      //send mail to seller on his lang
      Mail::to($exchangeData->getSellerUser->email)->locale($exchangeData->getSellerUser->locale)->send(new StatusMail($this->id));

      //send mail to buyer on his lang
      Mail::to($exchangeData->getBuyerUser->email)->locale($exchangeData->getBuyerUser->locale)->send(new StatusMail($this->id));

      // Mail to admin for test
      Mail::to('gtamborero@iproject.cat')->locale('en')->send(new StatusMail($this->id));

      $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
        "instanceId" => "80cd9f18-6ec1-49a7-a2c4-33be8cea555b",
        "secretKey" => "3AA4CFCA5410852A5FE1ADCC5257EAA4DE737FC104FA063FE2A6D396FBF71CD6",
      ));
      
      $publishResponse = $beamsClient->publishToInterests(
        array("hello"),
        array("web" => array("notification" => array(
          "title" => "Hello",
          "body" => "Hello, World!",
          "deep_link" => "https://www.pusher.com",
        )),
      ));
    }
}
