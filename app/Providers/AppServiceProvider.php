<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ...
    
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)

             ->subject('Verify Email Address')
             ->line('Click the button below to verify your email address.')
             ->action('Verify Email Address', $url);

            // Customize email message through view
                // ->subject('Please Verify Email Address')
                // ->view('emails.email-verification-message', ['url' => $url]);
        });
    }
}
