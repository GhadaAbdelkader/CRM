    <!-- Define the content section -->
    <div class="">
        <nav class="flex bg-white shadow ml-2 mb-2" aria-label="Breadcrumb">
            <div class="max-w-7xl py-3 px-4 sm:px-6 lg:px-8">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                           class="inline-flex items-center text-md font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#"
                               class="ms-1 text-md font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Leads</a>
                        </div>
                    </li>
                </ol>
            </div>
        </nav>
        <div class=" mx-auto ml-2 h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container mx-auto p-4">


                    <div  class="container mx-auto p-4">
                        <h2 class="text-2xl font-semibold mb-4">Account Details</h2>
                        @if(session('message'))
                            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="border p-4 rounded">
                            <form wire:submit.prevent="update">
                                <div class="grid grid-cols-1 gap-4">
                                    <!-- Lead Status -->
                                     <div class="bg-white shadow-sm rounded-md px-8 pt-6 pb-8 mb-4  relative">
                                        <label class="inline-block p-2 bg-indigo-50 border  rounded-t-md" >Personal Info</label>
                                        <hr class="border-indigo-500 mb-6">
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="mb-5">
                                        <label for="lead_status" class="block mb-2 text-sm font-medium text-gray-900">Lead
                                            Status</label>
                                            <select id="lead_status" name="lead_status" wire:model="$lead->form.lead_status"

                                                    class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="none">None</option>
                                                <option value="new">New</option>
                                                <option value="working">Working</option>
                                                <option value="nurturing">Nurturing</option>
                                                <option value="qualified">Qualified</option>
                                                <option value="unqualified">Unqualified</option>
                                            </select>
                                        @error('form.lead_status')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                            <!-- Lead Owner -->
                                            <div class="mb-5">
                                                <label for="lead_owner" class="block mb-2 text-sm font-medium text-gray-900">Lead
                                                    Owner</label>
                                                    <input id="lead_owner" name="lead_owner" type="text" wire:model="form.lead_owner"
                                                           class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @error('form.lead_owner')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <!-- Salutation -->
                                            <div class="mb-5">
                                                <label for="salutation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salutation</label>
                                                <select id="salutation" wire:model="form.salutation" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" disabled selected>Select Salutation</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Ms">Ms</option>
                                                </select>
                                                @error('form.salutation')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>

                                            <!-- First Name -->
                                            <div class="mb-5">
                                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First
                                                    Name</label>
                                                    <input id="first_name" name="first_name"  type="text" wire:model="form.first_name"
                                                           class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @error('form.first_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>

                                            <!-- Last Name -->
                                            <div class="mb-5">
                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last
                                                    Name</label>
                                                    <input id="last_name" name="last_name" type="text" wire:model="form.last_name"
                                                           class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @error('form.last_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>

                                                    <div class="mb-5">
                                                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                                                        <input id="title" name="title"  type="text" wire:model="form.title"
                                                               class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @error('form.title')<p class="text-red-600">{{ $message }}</p>@enderror
                                                    </div>
                                            <!-- Email -->
                                            <div class="mb-5">
                                                <label for="email"
                                                       class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                    <input id="email" name="email"  type="email" wire:model="form.email"
                                                           class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @error('form.email')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-5">
                                                <label for="phone"
                                                       class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                                                    <input id="phone" name="phone" type="text" wire:model="form.phone"
                                                           class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @error('form.phone')<p class="text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                     </div>
                                    <!-- Company Info -->
                                    <div class="bg-white shadow-sm rounded-md px-8 pt-6 pb-8 mb-4  relative">
                                            <label class="inline-block p-2 bg-indigo-50 border  rounded-t-md" >Company Info</label>
                                            <hr class="border-indigo-500 mb-6">
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="mb-5">
                                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Company</label>
                                            <input id="company" name="company" type="text" wire:model="form.company"
                                                   class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.company')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                                <div class="mb-5">
                                                    <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate</label>
                                                    <select id="rate" wire:model="form.rate" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="cold">Cold</option>
                                                        <option value="warm">Warm</option>
                                                        <option value="hot">Hot</option>
                                                    </select>
                                                    @error('form.rate')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="industry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industry</label>
                                                    <input id="industry" type="text" wire:model="form.industry" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.industry')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="no_of_employees" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employees</label>
                                                    <input id="no_of_employees" type="number" wire:model="form.no_of_employees" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.no_of_employees')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Source</label>
                                                    <select id="website" wire:model="form.website" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="" disabled selected>Select Source</option>
                                                        <option value="website">Website</option>
                                                        <option value="employee_referral">Employee Referral</option>
                                                        <option value="customer_event">Customer Event</option>
                                                        <option value="partner">Partner</option>
                                                        <option value="network">Network</option>
                                                        <option value="referral">Referral</option>
                                                        <option value="telemarketing">Telemarketing</option>
                                                    </select>
                                                    @error('form.website')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Address -->
                                    <div class="bg-white shadow-sm rounded-md px-8 pt-6 pb-8 mb-4  relative">
                                            <label class="inline-block p-2 bg-indigo-50 border  rounded-t-md" >Address</label>
                                            <hr class="border-indigo-500 mb-6">
                                            <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-5">
                                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                            <input id="address" name="address" type="text" wire:model="form.address"
                                                   class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.address')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                                <div class="mb-5">
                                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                                    <input id="city" type="text" wire:model="form.city" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.city')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                                    <input id="state" type="text" wire:model="form.state" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.state')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip</label>
                                                    <input id="zip" type="text" wire:model="form.zip" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.zip')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>

                                                <div class="mb-5">
                                                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                                    <input id="country" type="text" wire:model="form.country" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @error('form.country')<p class="text-red-600">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Update
                                        Account
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
