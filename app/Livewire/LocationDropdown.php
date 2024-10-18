<?php

namespace App\Livewire;

use App\Livewire\Forms\LeadForm;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class LocationDropdown extends Component
{
    public LeadForm $form;

    public function updatedCountry()
    {
        $this->form->state_province= null;


    }
    public function updatedState_province()
    {
        $this->form->city = null;



    }
    public function updatedForm()
    {
        $this->dispatch('locationUpdated', $this->form->country, $this->form->state_province, $this->form->city);
    }
    public function render()
    {
        return view('livewire.includes.location-dropdown', [
            'countries' => Country::all(),
            'states' => $this->form->country ? State::where('country_id', $this->form->country)->get() : [],
            'cities' => $this->form->state_province ? City::where('state_id', $this->form->state_province)->get() : [],
        ]);
    }
}
