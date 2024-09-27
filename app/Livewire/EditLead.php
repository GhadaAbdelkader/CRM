<?php
namespace App\Livewire;

use App\Livewire\Forms\LeadForm;
use App\Models\Lead; // Ensure this is imported
use Livewire\Component;

class EditLead  extends Component
{
    public LeadForm $form;
    public Lead $lead; // Declare the lead property
    public function mount(Lead $lead)
    {
        $this->form->setLead($lead);
    }

    public function render()
    {
        $this->leads = Lead::all();
        return view('livewire.account')->layout('layouts.app');
    }
    public function update()
    {
        $this->validate(); // Validate the form data

        $this->lead->update($this->form->all()); // Call update on the instance

        session()->flash('message', 'Lead Updated Successfully.'); // Flash success message

        return redirect()->route('leads.index'); // Redirect to the named route
    }
}
