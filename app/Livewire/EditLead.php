<?php
namespace App\Livewire;

use App\Livewire\Forms\LeadForm;
use App\Models\Lead; // Ensure this is imported
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EditLead  extends Component
{
    public LeadForm $form;
    public Lead $lead; // Declare the lead property
    public string $currentTab = 'personal'; // For managing active tab
    public array $completedTabs = []; // Array to keep track of completed tabs
    public array $statuses = ['new', 'working', 'nurturing', 'qualified', 'unqualified'];
    public function mount(Lead $lead)
    {
        $this->form->setLead($lead);
    }
    public function getCurrentStatusIndex()
    {
        return array_search($this->form->lead_status, $this->statuses);
    }
    public function statusClass($status)
    {
        $classes = [
            'new' => 'text-blue-600',
            'working' => 'text-yellow-600',
            'nurturing' => 'text-green-600',
            'qualified' => 'text-purple-600',
            'unqualified' => 'text-red-600',
        ];

        return $classes[$status] ?? 'text-gray-500 dark:text-gray-400';
    }
    public function setLeadStatus($status)
    {
        $this->form->lead_status = $status;
    }

    public function render()
    {
        $this->leads = Lead::all();
        $currentStatusIndex = $this->getCurrentStatusIndex();
        return view('livewire.account', [
            'statuses' => $this->statuses,
            'currentStatusIndex' => $currentStatusIndex,
        ])->layout('layouts.app');
    }
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
    public function update()
    {
        $this->validate(); // Validate the form data

        $this->lead->update($this->form->all()); // Call update on the instance

        session()->flash('message', 'Lead Updated Successfully.'); // Flash success message

        return redirect()->route('leads.index'); // Redirect to the named route
    }
    public function delete(Lead $lead)
    {
        $lead->delete();
        session()->flash('message', 'Lead Deleted Successfully.');
        return redirect()->route('leads.index');

    }
}
