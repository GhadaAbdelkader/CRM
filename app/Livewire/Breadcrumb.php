<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public string $currentPage;

    public function mount($currentPage = 'Create Lead')
    {
        $this->currentPage = $currentPage; // Initialize the current page
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
