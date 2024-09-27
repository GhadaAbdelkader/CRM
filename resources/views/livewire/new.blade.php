<div x-data="{ showModal: @entangle('isOpen'), tab: 'personal' }" x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" style="display: block; background-color: rgba(179, 179, 179, 0.23); z-index: 50;">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded-3xl px-8 pt-6 pb-8 mb-4 w-3/4  relative" style="overflow: auto;height: 670px;">
            <!-- Close button -->
            <button @click="showModal = false; @this.closeModal()" class=" transition absolute top-3 border rounded right-3 text-gray-500 hover:text-gray-800 hover:border-indigo-500 hover:bg-indigo-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-2xl font-semibold mb-4">Create New Lead</h2>
            @if(session('message'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif


            <div class="border p-4 rounded ">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                        <li class="me-2" role="presentation">
                            <button @click="tab = 'personal'" class="inline-block p-3 border border-b-2 rounded-t-sm" :class="{ 'border-indigo-500 text-indigo-800 bg-indigo-50': tab === 'personal' }">Personal Info</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button @click="tab = 'company'" class="inline-block p-3 border border-b-2 rounded-t-sm" :class="{ 'border-indigo-500 text-indigo-800 bg-indigo-50': tab === 'company' }">Company Info</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button @click="tab = 'address'" class="inline-block p-3 border border-b-2 rounded-t-sm" :class="{ 'border-indigo-500 text-indigo-800 bg-indigo-50': tab === 'address' }">Address</button>
                        </li>
                    </ul>
                </div>

                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 gap-4">

                        <!-- Personal Info Tab -->
                        <div x-show="tab === 'personal'">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-5">
                                    <label for="lead_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Status</label>
                                    <select id="lead_status" wire:model="form.lead_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="none">None</option>
                                        <option value="new">New</option>
                                        <option value="working">Working</option>
                                        <option value="nurturing">Nurturing</option>
                                        <option value="qualified">Qualified</option>
                                        <option value="unqualified">Unqualified</option>
                                    </select>
                                    @error('form.lead_status')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="lead_owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Owner</label>
                                    <input id="lead_owner" type="text" wire:model="form.lead_owner" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.lead_owner')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="salutation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salutation</label>
                                    <input id="salutation" type="text" wire:model="form.salutation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.salutation')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                    <input id="first_name" type="text" wire:model="form.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.first_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                    <input id="last_name" type="text" wire:model="form.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.last_name')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input id="title" type="text" wire:model="form.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.title')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input id="email" type="email" wire:model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.email')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                    <input id="phone" type="text" wire:model="form.phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.phone')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Company Info Tab -->
                        <div x-show="tab === 'company'">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-5">
                                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                                    <input id="company" type="text" wire:model="form.company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('form.company')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"">Rate</label>
                                    <select id="rate" wire:model="form.rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="cold">Cold</option>
                                        <option value="warm">Warm</option>
                                        <option value="hot">Hot</option>
                                    </select>
                                    @error('form.rate')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="industry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industry</label>
                                    <input id="industry" type="text" wire:model="form.industry" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.industry')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="no_of_employees" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employees</label>
                                    <input id="no_of_employees" type="number" wire:model="form.no_of_employees" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.no_of_employees')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                                    <input id="website" type="url" wire:model="form.website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.website')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Tab -->
                        <div x-show="tab === 'address'">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-5">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <input id="address" type="text" wire:model="form.address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.address')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                    <input id="city" type="text" wire:model="form.city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.city')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                    <input id="state" type="text" wire:model="form.state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.state')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip</label>
                                    <input id="zip" type="text" wire:model="form.zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.zip')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-5">
                                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                    <input id="country" type="text" wire:model="form.country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('form.country')<p class="text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded">Save Lead</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
