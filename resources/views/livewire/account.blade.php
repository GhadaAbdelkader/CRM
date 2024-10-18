<div class="">



    <div x-data="{
                    currentTab: @entangle('currentTab'),
                    completedTabs: @entangle('completedTabs'),
                }"
                         x-init="
                    $watch('currentTab', value => {
                        console.log('Current tab:', value);
                    });

                    $watch('completedTabs', value => {
                        console.log('Completed tabs updated:', value);
                    });

                    Livewire.on('tabChanged', (tab, completedTabs) => {
                        currentTab = tab;
                        completedTabs = completedTabs;
                    });
                "

         class=" mx-auto ml-2 h-screen">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="container mx-auto p-4 border sm:rounded-lg border-r-indigo-50">
                @livewire('breadcrumb', ['currentPage' => 'Lead Account'])


                <div class="border p-6 rounded">
                    <h2 class="text-2xl font-semibold mb-7">Lead Account</h2>
                    @if(session('message'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="update" class="w-9/12">
                        <div class=" rounded-lg border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800 mb-5 ">
                            <div class="w-full p-4 bg-teal-50 pb-14 ">
                                <div class="float-left flex">
                                    <img class="w-10 h-10 mb-3 rounded-full shadow-lg" src="{{ asset('assets/img/profile.jpg') }}" alt="Bonnie image">
                                    <div class="ml-2">
                                        <span class="block ">Lead</span>
                                        <lable>{{ $lead->salutation}} / {{ $lead->first_name}} {{ $lead->last_name}}</lable>
                                    </div>
                                </div>
                                <div class="inline-flex rounded-md shadow-sm mb-2 float-right px-2" role="group">
                                    <button type="button"  class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-teal-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        <a href="{{ route('lead.create') }}">Create</a>
                                    </button>
                                    <button type="button" wire:click="delete({{ $lead->id }})" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-teal-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Delete
                                    </button>
                                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-teal-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Messages
                                    </button>
                                </div>
                            </div>
                            <div class="w-full p-4 flex justify-between">
                                <lable> Title: {{ $lead->title}}</lable>
                                <lable> Phone: {{ $lead->phone}}</lable>
                                <lable> Email: {{ $lead->email}}</lable>
                            </div>
                        </div>
                        <div class="space-y-6 sm:space-y-8">
                            <div class="mb-5">
                                <label for="lead_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Status:
                                </label>
                                <ol class="flex flex-col gap-4 rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 sm:justify-center md:flex-row md:items-center lg:gap-6">
                                    @foreach ($statuses as $index => $status)
                                        <li class="flex items-center gap-2 md:flex-1 md:flex-col md:gap-1.5 lg:flex-none">
                                            <a href="#"
                                               wire:model="form.lead_status"
                                               wire:click.prevent="setLeadStatus('{{ $status }}')"
                                               class="flex items-center gap-2">
                                                <svg class="h-5 w-5
                                                     {{ $index <= $currentStatusIndex ?  $this->statusClass($status) : 'text-gray-500 dark:text-gray-400' }}"
                                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                                </svg>
                                                <p class="text-sm font-medium leading-tight {{ $index <= $currentStatusIndex ? $this->statusClass($status) : 'text-gray-500 dark:text-gray-400' }}">
                                                    {{ ucfirst($status) }}
                                                </p>
                                            </a>
                                        </li>
                                        @if (!$loop->last)
                                            <div class="hidden h-px w-8 shrink-0 bg-gray-200 dark:bg-gray-700 md:block xl:w-16"></div>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                        <label for="lead_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit:
                        </label>

                        @include('livewire.includes.tabs-checkbox')

                        <div class="grid grid-cols-1 gap-4">

                            <!-- Personal Info Tab -->
                            <div x-show="currentTab === 'personal'">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-5">
                                        <label for="lead_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Status
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <select id="lead_status" wire:model="form.lead_status" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option class="text-teal-600" value="0"  selected>Select Status</option>
                                            <option value="new">New</option>
                                            <option value="working">Working</option>
                                            <option value="nurturing">Nurturing</option>
                                            <option value="qualified">Qualified</option>
                                            <option value="unqualified">Unqualified</option>
                                        </select>
                                        @error('form.lead_status')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="lead_owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Owner
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <input id="lead_owner" type="text" wire:model="form.lead_owner" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.lead_owner')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="salutation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salutation
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <select id="salutation" wire:model="form.salutation" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option class="text-teal-600" value="0"  selected>Select Salutation</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Ms">Ms</option>
                                        </select>
                                        @error('form.salutation')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <input id="email" type="email" wire:model="form.email" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.email')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <input id="first_name" type="text" wire:model="form.first_name" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.first_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>


                                    <div class="mb-5">
                                        <label for="title" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input id="title" type="text" wire:model="form.title" class="py-1.5  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.title')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <input id="last_name" type="text" wire:model="form.last_name" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.last_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>


                                    <div class="mb-5">
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <input id="phone" type="text" wire:model="form.phone" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.phone')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="gender">Gender:</label>
                                        <select wire:model.defer="form.gender" id="gender" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('form.gender')<p class="text-red-600">{{ $message }}</p>@enderror

                                    </div>
                                    <div class="mb-5">
                                        <label for="birthday">Birthday:</label>
                                        <input type="date" wire:model.defer="form.birthday" id="birthday"
                                               class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        @error('form.birthday')<p class="text-red-600">{{ $message }}</p>@enderror

                                    </div>
                                </div>
                            </div>

                            <!-- Company Info Tab -->
                            <div x-show="currentTab === 'company'">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-5">
                                        <label for="company_co" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                                        <input id="company_co" type="text" wire:model="form.company" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.company')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <select id="rate" wire:model="form.rate" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option class="text-teal-600" value="0"  selected>Select Rate</option>
                                            <option value="cold">Cold</option>
                                            <option value="warm">Warm</option>
                                            <option value="hot">Hot</option>
                                        </select>
                                        @error('form.rate')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="industry" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Industry</label>
                                        <input id="industry" type="text" wire:model="form.industry" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.industry')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="no_of_employees" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employees</label>
                                        <input id="no_of_employees" type="number" wire:model="form.no_of_employees" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('form.no_of_employees')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="lead_source" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Source
                                            <svg class="inline mb-2 " xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#EA3323"><path d="m321-252 43-177-141-119 184-16 73-167 73 168 184 15-141 119 43 177-159-94-159 94Z"/></svg>
                                        </label>
                                        <select id="lead_source" wire:model="form.lead_source" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option class="text-teal-600" value="0"  selected>Select Source</option>
                                            <option value="website">Website</option>
                                            <option value="employee_referral">Employee Referral</option>
                                            <option value="customer_event">Customer Event</option>
                                            <option value="partner">Partner</option>
                                            <option value="network">Network</option>
                                            <option value="referral">Referral</option>
                                            <option value="telemarketing">Telemarketing</option>
                                        </select>
                                        @error('form.lead_source')<p class="text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Address Tab -->
                            <div x-show="currentTab === 'address'">
                                <div class="grid grid-cols-2 gap-2">
                                    <livewire:location-dropdown />
                                    <div>
                                        <div class="mb-5">
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                            <input id="address" type="text" wire:model="form.address" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('form.address')<p class="text-red-600">{{ $message }}</p>@enderror
                                        </div>


                                        <div class="mb-5">
                                            <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                                            <input id="street" type="text" wire:model="form.street" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('form.street')<p class="text-red-600">{{ $message }}</p>@enderror
                                        </div>

                                        <div class="mb-5">
                                            <label for="zip_postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip</label>
                                            <input id="zip_postal_code" type="text" wire:model="form.zip_postal_code" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('form.zip_postal_code')<p class="text-red-600">{{ $message }}</p>@enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="h-10 mt-4">
                            <button type="button" @click="$wire.previousTab()" x-show="currentTab !== 'personal'" class="font-bold w-32 px-4 py-2 bg-gray-600 text-white rounded float-left">
                                <svg class="inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z"/></svg>
                                Previous</button>
                            <button type="button"  @click="$wire.nextTab()" x-show="currentTab !== 'address'" class="font-bold w-28 px-4 py-2 bg-teal-600 text-white rounded float-right">
                                Next
                                <svg class="inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z"/></svg>
                            </button>
                            <button type="submit" x-show="currentTab === 'address'" class="px-4 py-2 bg-teal-600 text-white rounded float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
