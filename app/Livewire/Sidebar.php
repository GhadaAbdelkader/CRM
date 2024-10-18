<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public bool $sidebarIsOpen = true; // Initially open sidebar



    public function toggleSidebar()
    {
        $this->sidebarIsOpen = !$this->sidebarIsOpen;
        $this->dispatch('sidebarToggled', $this->sidebarIsOpen);
    }


    public function render()
    {

        return view('livewire.layout.sidebar') ;// Pass sidebarIsOpen to the view

    }
}
