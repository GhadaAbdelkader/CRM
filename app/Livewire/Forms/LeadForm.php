<?php

namespace App\Livewire\Forms;

use App\Models\Lead;
use Illuminate\Validation\ValidationException;
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
            'lead_status' => 'required|string', // Required and should be a string
            'lead_owner' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'first_name' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'last_name' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'email' => 'required|email|max:255', // Required, should be a valid email, and has a max length of 255
            'phone' => 'required|string|regex:/^[0-9\+\-\s]*$/|max:20|min:11', // Required, should be a string, and has a max length of 20
            'lead_source' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'company' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'rate' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'industry' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'no_of_employees' => 'nullable|integer|max:100000',
            'address' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'street' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'city' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'state_province' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'zip_postal_code' => 'nullable|string|max:20', // Optional, should be a string, and has a max length of 20
            'country' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255

        ];

    }

    /**
     * @throws ValidationException
     */
    public function personalRules(): array
    {

        $this->validate([
            'lead_status' => 'required|string|not_in:0', // Required and should be a string
            'lead_owner' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'first_name' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'last_name' => 'required|string|max:255', // Required, should be a string, and has a max length of 255
            'email' => 'required|email|max:255', // Required, should be a valid email, and has a max length of 255
            'phone' => 'required|string|regex:/^[0-9\+\-\s]*$/|max:20|min:11', // Required, should be a string, and has a max length of 20

            ]);
        return [];
    }

    /**
     * @throws ValidationException
     */
    public function companyRules(): array
    {
        $this->validate([
            'company' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'rate' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'industry' => 'nullable|string|max:255', // Optional, should be a string, and has a max length of 255
            'no_of_employees' => 'nullable|integer|max:100000',
            'lead_source' => 'required|string|max:255',
        ]);
        return [];
    }


    public function setLead(Lead $lead)
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
        $this->lead_status = '';
        $this->lead_owner = '';
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->title = '';
        $this->email = '';
        $this->phone = '';
        $this->company = '';
        $this->rate = '';
        $this->industry = '';
        $this->no_of_employees = '0';
        $this->lead_source = '';
        $this->address = '';
        $this->street = '';
        $this->city = '';
        $this->state_province = '';
        $this->zip_postal_code = '';
        $this->country = '';
    }

}
