<?php

use App\Livewire\EditLead;
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
Route::get('/leads/{lead}', EditLead ::class)->name('lead.account');
require __DIR__.'/auth.php';
