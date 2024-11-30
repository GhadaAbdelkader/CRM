<?php
namespace App\Http\Livewire;

use Livewire\Component;

class StylesPanel extends Component
{
    public $elements = [];
    public $selectedElement = null;

    protected $listeners = ['selectElement'];

    public function selectElement($index)
    {
        $this->selectedElement = $index;
    }

    public function render()
    {
        return view('livewire.styles-panel');
    }
}
