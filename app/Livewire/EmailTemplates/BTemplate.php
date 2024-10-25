<?php

namespace App\Livewire\EmailTemplates;

use Livewire\Component;

class BTemplate extends Component
{
    public $subject;
    public $body;
    public $signature;

    protected $listeners = ['updateTemplate' => 'updateTemplateContent'];

    public function updateTemplateContent($subject, $body, $signature)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->signature = $signature;
    }
    public function render()
    {
        return view('livewire.email-templates.b-template');
    }
}
