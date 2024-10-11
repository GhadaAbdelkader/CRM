<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
class AppLayout extends Component
{
    public $isOpen = true;  // Define the `isOpen` property here
    public function toggleSidebar()
    {
        $this->isOpen = !$this->isOpen; // Toggle sidebar
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
