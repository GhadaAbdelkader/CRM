<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarketingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $lead
     * @return void
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.marketing-email') // Ensure you have this view created
        ->with([
            'firstName' => $this->lead->first_name,
            'lastName' => $this->lead->last_name,
            'email' => $this->lead->email,
        ]);
    }
}
