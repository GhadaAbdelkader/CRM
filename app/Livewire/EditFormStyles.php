<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class EditFormStyles extends Component
{
    #[Reactive]
    public $selectedElement;
    public $fontSize;
    public $fontColor;
    public $padding;
    public $elementStyles = [];
    public $selectedElementId = null; // Track the selected element ID

    protected $listeners = ['elementSelected'];



    public function updatedFontsize()
    {
        $this->dispatch('updateStyles', $this->fontSize, $this->fontColor, $this->padding);
    }

    public function updatedFontcolor()
    {
        $this->dispatch('updateStyles', $this->fontSize, $this->fontColor, $this->padding);
    }

    public function updatedPadding()
    {
        $this->dispatch('updateStyles', $this->fontSize, $this->fontColor, $this->padding);
    }



    public function render()
    {
        return view('livewire.edit-form-styles')->layout('layouts.app');
    }
}
