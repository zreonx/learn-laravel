<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use Illuminate\Support\Facades\Mail;

class SendSubscribeEmail
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
    public function handle(UserSubscribed $event): void
    {
        // dd('listener called' . $event->name);
        Mail::raw('Thank you for subscribing for our newsletter', 
        function($message) use ($event) {
            $message->to($event->user->email);
            $message->subject('Thank you');
        });
    }
}
