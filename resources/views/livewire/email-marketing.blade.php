
    <div x-data="{ step: @entangle('step') }" class=" mx-auto ml-2 h-screen">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="container mx-auto p-4 border sm:rounded-lg border-r-indigo-50">
                @livewire('breadcrumb', ['currentPage' => 'Create Email'])

                <!-- Step 1: Lead Selection -->
                <div x-show="step === 1" class="border p-6 rounded">
                    <h2 class="text-2xl font-semibold mb-7">Create New Email</h2>
                    <form wire:submit.prevent="proceedToCompose">
            <!-- Filter by Status -->

                <!-- Personal Info Tab -->
                    <div class="grid grid-cols-4 gap-4">
                        <div class="mb-5">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lead Status:</label>
                            <select wire:model.live="status" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="">Select Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                            <select wire:model.live="gender" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <!-- Filter by Country -->
                        <div class="mb-5">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country:</label>
                            <select wire:model.live="country"  class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Filter by Birthday -->
                        <div class="mb-5" >
                            <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday:</label>
                            <select wire:model.live="birthday"  class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Select Birthday</option>
                                @foreach($birthdays as $birthday)
                                    <option value="{{ $birthday }}">{{ $birthday }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Filter by Age -->
                        <div class="mb-5">
                            <label for="min_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age Range:</label>
                            <select wire:model.live="min_age"  id="min_age" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                                <option value="">Min Age</option>
                                @foreach($ages as $age)
                                    <option value="{{ $age }}">{{ $age }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                                <label for="max_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age Range:</label>
                                <select wire:model.live="max_age" id="max_age" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                                    <option value="">Max Age</option>
                                    @foreach($ages as $age)
                                        <option value="{{ $age }}">{{ $age }}</option>
                                    @endforeach
                                </select>
                            </div>

                    </div>
            <!-- Leads Table -->

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Filtered Leads:</h3>
                        <div class="px-4 overflow-x-auto"> <!-- Add this for horizontal scroll if needed -->
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input   id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Lead Status</th>
                                    <th scope="col" class="px-6 py-3">Birthday</th>
                                </tr>
                                </thead>
                            </table>
                            <div style="height: 200px; overflow-y: auto;"> <!-- Wrap tbody in a div for scrolling -->
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                    <tbody>
                                    @forelse($leads as $lead)
                                        <tr wire:key="{{ $lead->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input  id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $lead->salutation ?? 'N/A' }} / {{ $lead->first_name ?? 'N/A' }} {{ $lead->last_name ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4">{{ $lead->email ?? 'N/A' }}</td>
                                            <td class="px-6 py-4">{{ $lead->lead_status ?? 'N/A' }}</td>
                                            <td class="px-6 py-4">{{ $lead->birthday ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center p-4">No leads found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="h-10 mt-4">
                        <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded float-right">Next</button>
                    </div>
        </form>
                </div>
                <div x-show="step === 2" class="border p-6 rounded">


                    <form wire:submit.prevent="sendEmails">
                        <div class=" rounded-lg border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800 mb-5 ">
                            <div class="w-full p-4 bg-teal-50 pb-14 ">
                                <div class="float-left flex">
                                    <h2 class="text-2xl font-semibold mb-7">Compose Email</h2>

                                </div>

                            </div>
                            <div class="w-full p-4 flex justify-between">
                                <p>Total Selected Leads: {{ count($selectedLeads) }}</p> <!-- Display the count of filtered leads -->

                            </div>
                        </div>

                        <!-- Email Header -->
                        <div class="mt-5">
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Subject:</label>
                            <input type="text" wire:model="subject" id="subject" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>

                        <!-- Email Body -->
                        <div class="mt-5">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Body:</label>
                            <textarea wire:model="body" id="body" class="border p-2 w-full h-32"></textarea>
{{--                            <livewire:tinymce-editor />--}}

                        </div>

                        <!-- Show the selected leads -->
                        <div class="mt-5">
                            <button type="button" wire:click="goToPreviousStep" class="px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
                            <button type="submit" class="float-right px-4 py-2 bg-teal-600 text-white rounded">Send Emails</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
