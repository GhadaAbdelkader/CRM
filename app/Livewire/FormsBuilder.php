<?php

namespace App\Livewire;

use Livewire\Component;

class FormsBuilder extends Component
{
    public function render()
    {
        return view('livewire.forms-builder')->layout('layouts.app');
    }
}
