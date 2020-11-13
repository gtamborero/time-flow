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
use App\Exchanges;

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
    }
}
