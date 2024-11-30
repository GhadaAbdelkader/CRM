<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormPreview extends Component
{
    public $elements = [];

    protected $listeners = ['addElement', 'selectElement'];

    public function addElement($type)
    {
        $this->elements[] = ['type' => $type, 'properties' => []];
    }

    public function render()
    {
        return view('livewire.form-preview');
    }
}
