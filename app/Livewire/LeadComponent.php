<?php
namespace App\Livewire;

use App\Livewire\Forms\LeadForm;
use App\Models\Lead; // Ensure this is imported
use Livewire\Component;

class LeadComponent  extends Component
{
    public LeadForm $form;
    public $isOpen = false;
    public $leads;


    public function render()
    {
        $this->leads = Lead::all();
        return view('livewire.lead', ['leads' => $this->leads])->layout('layouts.app');
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
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();

        $lead =  Lead::create(
            $this->form->all()
        );
        session()->flash('message', 'Lead Created Successfully.');
        $this->closeModal();
//        $this->reset();
        $this->form->resetFields();
        return redirect()->route('leads.index');

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
