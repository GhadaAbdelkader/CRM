<?php

namespace App\Livewire\Forms;

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LeadForm extends Form
{
    public $leads, $id, $lead_status, $lead_owner, $salutation, $first_name, $last_name, $title;
    public $email, $phone, $company, $rate, $industry, $no_of_employees, $lead_source;
    public $address, $street, $city, $state_province, $zip_postal_code, $country;
    public ?Lead $lead;

    public function rules(): array
    {
        return [
            'lead_status' => 'required',
            'lead_owner' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',

        ];
    }public function setLead(Lead $lead)
    {
        $this->lead = $lead;
        $this->lead_status = $lead->lead_status;
        $this->lead_owner = $lead->lead_owner;
        $this->salutation = $lead->salutation;
        $this->first_name = $lead->first_name;
        $this->last_name = $lead->last_name;
        $this->title = $lead->title;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
        $this->company = $lead->company;
        $this->rate = $lead->rate;
        $this->industry = $lead->industry;
        $this->no_of_employees = $lead->no_of_employees;
        $this->lead_source = $lead->lead_source;
        $this->address = $lead->address;
        $this->street = $lead->street;
        $this->city = $lead->city;
        $this->state_province = $lead->state_province;
        $this->zip_postal_code = $lead->zip_postal_code;
        $this->country = $lead->country;
    }
    public function resetFields()
    {
        $this->lead_status = 'none';
        $this->lead_owner = '';
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->title = '';
        $this->email = '';
        $this->phone = '';
        $this->company = '';
        $this->rate = 'cold';
        $this->industry = '';
        $this->no_of_employees = '';
        $this->lead_source = 'other';
        $this->address = '';
        $this->street = '';
        $this->city = '';
        $this->state_province = '';
        $this->zip_postal_code = '';
        $this->country = '';
    }

}
