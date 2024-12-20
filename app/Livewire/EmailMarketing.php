<?php
namespace App\Livewire;

use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class EmailMarketing extends Component
{
    public $status, $gender, $country, $birthday, $min_age, $max_age;
    public $leads = [];  // Holds the filtered leads
    public $ages = []; // This will hold all unique ages
    public $selectedLeads = []; // Selected leads for sending
    public $step = 1; // Keep track of the current step
    public $selectedDiv = 1; // Default selection
    public $subject = '';
    public $body = '';
    public $signature = '';

    use WithPagination;
    public function updatedSubject()
    {
        $this->dispatch('updateTemplate', $this->subject, $this->body, $this->signature);
    }

    public function updatedBody()
    {
        $this->dispatch('updateTemplate', $this->subject, $this->body, $this->signature);
    }

    public function updatedSignature()
    {
        $this->dispatch('updateTemplate', $this->subject, $this->body, $this->signature);
    }
    public function render()
    {
        return view('livewire.email-marketing', [
            'statuses' => Lead::distinct('lead_status')->pluck('lead_status'),
            'countries' => Lead::distinct('country')->pluck('country'),
            'birthdays' => Lead::distinct('birthday')->pluck('birthday'),
        ])->layout('layouts.app');
    }

    public function mount() {
        $this->leads = [];

        $this->ages = Lead::all()->map(function ($lead) {
            return $lead->age; // Get age from birthday
        })->unique()->sort()->values()->toArray(); // Get unique ages, sort, and convert to array

    }

    public function updated($propertyName) {
        $this->filterLeads();
    }

    public function filterLeads()
    {
        // Only perform filtering if at least one filter is applied
        if ($this->status || $this->gender || $this->country || $this->birthday || $this->min_age || $this->max_age) {
            $query = Lead::query();

            // Apply the lead status filter
            if ($this->status) {
                $query->where('lead_status', $this->status);
            }

            // Apply the gender filter
            if ($this->gender) {
                $query->where('gender', $this->gender);
            }

            // Apply the country filter
            if ($this->country) {
                $query->where('country', $this->country);
            }

            // Apply the birthday filter
            if ($this->birthday) {
                $query->whereDate('birthday', $this->birthday);
            }

            // Apply the age range filter
            if ($this->min_age && $this->max_age) {
                $query->whereBetween('birthday', [
                    now()->subYears($this->max_age)->format('Y-m-d'),
                    now()->subYears($this->min_age)->format('Y-m-d'),
                ]);
            } elseif ($this->min_age) {
                $query->where('birthday', '<=', now()->subYears($this->min_age)->format('Y-m-d'));
            } elseif ($this->max_age) {
                $query->where('birthday', '>=', now()->subYears($this->max_age)->format('Y-m-d'));
            }

            // Get the filtered leads
            $this->leads = $query->get();
            $this->selectedLeads = $this->leads->isNotEmpty() ? $this->leads->pluck('id')->toArray() : [];
        } else {
            // If no filters are applied, reset the leads and selected leads
            $this->leads = [];
            $this->selectedLeads = [];
        }
    }



    public function proceedToCompose() {
        // Filter the leads array and keep only selected ones
        $this->selectedLeads = $this->leads;

        // Move to step 2 (the email composition step)
        if ($this->step === 1) {
            $this->step = 2; // Move from step 1 to step 2
        } elseif ($this->step === 2) {
            $this->step = 3; // Move from step 2 to step 3
        }
    }
    public function goToPreviousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function sendEmails()
    {
        // Check if there are any leads to send emails to
        if (empty($this->selectedLeads)) {
            session()->flash('error', 'No selected leads to send emails to.');
            return; // Stop execution if there are no selected leads
        }

        $leads = \App\Models\Lead::whereIn('id', $this->selectedLeads)->get();

        foreach ($leads as $lead) {
            \Log::info("Sending email to: {$lead->email}");

            \Mail::to($lead->email)->send(
                new \App\Mail\MarketingEmail(
                    $lead,
                    $this->selectedDiv,
                    $this->subject,
                    $this->body,
                    $this->signature
                )
            );
            sleep(1); // Wait for 1 second between emails
        }

        session()->flash('message', 'Emails sent successfully to the selected leads.');
    }
}
