<?php

namespace App\Listeners;

use App\Events\CustomerRegistered;
use App\Mail\CustomerVerifyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCustomerVerificationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerRegistered $event): void
    {
        if($event->customer->enabled){
            return;
        }
        Mail::to($event->customer->email)->send(new CustomerVerifyMail($event->customer));
    }
}
