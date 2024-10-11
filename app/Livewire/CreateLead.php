<?php
namespace App\Livewire;

use App\Livewire\Forms\LeadForm;
use App\Models\Lead; // Ensure this is imported
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateLead  extends Component
{
    public LeadForm $form;
    public Lead $lead; // Declare the lead property
    public string $currentTab = 'personal'; // For managing active tab
    public array $completedTabs = []; // Array to keep track of completed tabs
    public function render()
    {
        return view('livewire.create')->layout('layouts.app');
    }
//    public function updatedForm()
//    {
//        $this->validate();
//    }
    /**
     * @throws ValidationException
     */
    public function nextTab()
    {

        if ($this->currentTab === 'personal') {
            $this->form->personalRules();
            $this->completedTabs[] = 'personal';
            $this->currentTab = 'company';
        } elseif ($this->currentTab === 'company') {
            $this->form->companyRules();
            $this->completedTabs[] = 'company';
            $this->currentTab = 'address';
        } else {
//            $this->form->addressRules();
            $this->completedTabs[] = 'address';
        }
        // Emit the event to notify that the tab has changed
        $this->dispatch('tabChanged', $this->currentTab);
    }

    public function previousTab()
    {
        if ($this->currentTab === 'company') {
            $this->currentTab = 'personal';
        } elseif ($this->currentTab === 'address') {
            $this->currentTab = 'company';
        }
        $this->dispatch('tabChanged', $this->currentTab);

    }
    public function store()
    {
        $this->validate();

        $lead =  Lead::create(
            $this->form->all()
        );
        session()->flash('message', 'Lead Created Successfully.');
        $this->reset();
        return redirect()->route('lead.account', ['lead' => $lead->id]);

    }
}
