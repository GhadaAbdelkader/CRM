<?php
namespace App\Livewire;

use App\Livewire\Forms\LeadForm;
use App\Models\City;
use App\Models\Country;
use App\Models\Lead;
use App\Models\State;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class LeadComponent  extends Component
{
    use WithPagination;
    public LeadForm $form;
    public $isOpen = false;
    public $search;
    public string $currentTab = 'personal';
    public array $completedTabs = [];
    use WithPagination;




    public function render()
    {
        $leads = Lead::where('first_name', 'like', "%{$this->search}%")
            ->orWhere('last_name', 'like', "%{$this->search}%")
            ->paginate(5); // Execute the query and get the collection

        return view('livewire.lead', [
            'leads' => $leads,
             'countries' => $this->form->country,
        ])->layout('layouts.app');
    }


    public function create()
    {
        $this->form->resetFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->currentTab = 'personal';
        $this->completedTabs = [];
        $this->form->resetFields();
        $this->isOpen = false;
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
        $this->dispatch('tabChanged', $this->currentTab, $this->completedTabs);
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
    protected $listeners = ['locationUpdated'];

    public function locationUpdated($country, $state_province, $city)
    {
        \Log::info('Location updated: ', compact('country', 'state_province', 'city'));

        $this->form->locationUpdated($country, $state_province, $city);
    }
    public function store()
    {
        $this->validate();
        $this->form->resolveValues();
        $lead =  Lead::create(
            $this->form->all()
        );
        session()->flash('message', 'Lead Created Successfully.');
        $this->closeModal();
        $this->reset();
        return redirect()->route('lead.account', ['lead' => $lead->id]);

    }
    public function edit($id)
    {
        return redirect()->route('lead.account', ['lead' => $id]);
    }

    public function delete(Lead $lead)
    {
        $lead->delete();
        session()->flash('message', 'Lead Deleted Successfully.');
    }

}
