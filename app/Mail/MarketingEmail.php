<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarketingEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $body;
    public $signature;
    public $selectedDiv;
    public $lead;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $lead
     * @return void
     */
    public function __construct($lead, $selectedDiv, $subject, $body, $signature)
    {
        $this->lead = $lead;
        $this->selectedDiv = $selectedDiv;
        $this->subject = $subject;
        $this->body = $body;
        $this->signature = $signature;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Choose view based on `selectedDiv`
        $view = match ($this->selectedDiv) {
            1 => 'emails.a-template',
            2 => 'emails.b-template',
            3 => 'emails.c-template',
            4 => 'emails.d-template',
            5 => 'emails.e-template',
            6 => 'emails.f-template',
            default => 'emails.default-html-email',
        };

        // Render the selected HTML view with provided data
        return $this->view($view)
            ->with([
                'subject' => $this->subject,
                'body' => $this->body,
                'signature' => $this->signature,
            ]);
    }
}
