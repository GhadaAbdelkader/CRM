<?php

use App\Livewire\EmailMarketing;
use App\Livewire\CreateLead;
use App\Livewire\EditLead;
use App\Livewire\FormBuilder;
use App\Livewire\FormsBuilder;
use App\Livewire\LeadComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/leads', LeadComponent::class)->name('leads.index');
Route::get('/leads/create', CreateLead ::class)->name('lead.create');
Route::get('/leads/{lead}', EditLead ::class)->name('lead.account');

Route::get('/email-marketing', EmailMarketing::class)->name('email.marketing');
Route::get('/form-builder', FormBuilder::class)->name('lead.form-builder');
Route::get('/forms-builder', FormsBuilder::class)->name('lead.forms-builder');


//Route::get('/send-mail', function () {
//    \Mail::raw('This is a test email', function ($message) {
//        $message->to('test@example.com')->subject('Test Email');
//    });
//
//    return 'Email sent!';
//});
require __DIR__.'/auth.php';
