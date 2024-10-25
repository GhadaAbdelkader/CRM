
<div x-data="{ step: @entangle('step') ,  selectedLeads: [], selectedDiv: @entangle('selectedDiv'), showModal: false }" class=" mx-auto ml-2 h-screen bg-white">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <div class="container h-full mx-auto p-4 border sm:rounded-lg border-r-indigo-50">
            @livewire('breadcrumb', ['currentPage' => 'Create Email'])

            <!-- Step 1: Lead Selection -->
            <div x-show="step === 1" class="border p-6 rounded">


                <form wire:submit.prevent="proceedToCompose">
                    <div class=" rounded-lg border border-gray-200  border-l-teal-600 border-l-4 dark:border-gray-700 dark:bg-gray-800 mb-5 ">
                        <div class="w-full p-4  pb-10 ">
                            <div class="float-left flex">
                                <h2 class="text-lg text-gray-700 ">Select Leads</h2>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 mt-6 rounded-lg border border-gray-100 shadow px-8 py-8">
                        <div class="w-full p-4 flex justify-between">
                            <div class=" flex justify-start border-b-2 border-b-teal-600 rounded-lg">
                                <h3 class=" mb-2 pt-4"> Total Selected Leads: </h3>
                                <h4 class="px-2 ml-2 pt-4 text-gray-600 h-6 ">{{ count($selectedLeads) }} </h4>
                            </div>
                            <div class=" flex">

                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-600 shadow border border-gray-200  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Filter <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden bg-white shadow border border-gray-100 divide-y divide-gray-100 rounded-lg shadow w-80 dark:bg-gray-700" style="transform: translate3d(1176.2px, 300.8px, 0px);">
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                    </div>
                                    <div class="px-7 py-5">
                                        <!--begin::Input group-->

                                        <div class="mb-5">
                                            <label for="lead_status"  class="block text-sm font-medium text-gray-900">Status</label>
                                            <select id="lead_status" wire:model.live="status"
                                                    class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Select Status</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-900">Select Gender</label>
                                                <div class="flex items-center">
                                                    <input type="checkbox" value="male" wire:model.live="gender" id="male" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                                    <label for="male" class="ml-2 block text-sm text-gray-900">Male</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" value="female" wire:model.live="gender" id="female" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                                    <label for="female" class="ml-2 block text-sm text-gray-900">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Filter by Country -->
                                        <div class="mb-5">
                                            <select wire:model.live="country"  class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Filter by Birthday -->
                                        <div class="mb-5" >
                                            <select wire:model.live="birthday"  class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                <option value="">Select Birthday</option>
                                                @foreach($birthdays as $birthday)
                                                    <option value="{{ $birthday }}">{{ $birthday }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Filter by Age -->

                                        <div class="mb-5">
                                            <label for="min_age" >Min Age: <span id="min_age_value">{{ $min_age }}</span></label>
                                            <input type="range" id="min_age" wire:model.live="min_age" min="0" max="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none text-teal cursor-pointer dark:bg-gray-700" oninput="document.getElementById('min_age_value').innerText = this.value">
                                        </div>

                                        <div class="mb-5">
                                            <label for="max_age" >Max Age: <span id="max_age_value">{{ $max_age }}</span></label>
                                            <input type="range" id="max_age" wire:model.live="max_age" min="0" max="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none text-teal cursor-pointer dark:bg-gray-700" oninput="document.getElementById('max_age_value').innerText = this.value">
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="px-4 overflow-x-auto"> <!-- Add this for horizontal scroll if needed -->
                            <table class="w-full text-sm rounded-xl text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                <thead class="flex w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border border-gray-200 ">
                                <tr class="flex w-full mb-2 mt-2">
                                    <th scope="col" class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input   id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4 w-1/4">Name</th>
                                    <th scope="col" class="p-4 w-1/4">Email</th>
                                    <th scope="col" class=" pt-4 pb-4 w-1/4">Lead Status</th>
                                    <th scope="col" class=" pt-4 pb-4 w-1/4">Birthday</th>
                                </tr>
                                </thead>
                                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                                    @forelse($leads as $lead)
                                        <tr wire:key="{{ $lead->id }}" class="flex w-full mb-4bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="pl-4 pt-4 pb-4">
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                         >
                                                    <label  class="sr-only">checkbox</label>

                                                </div>
                                            </td>
                                            <td  class="p-4 w-1/4">
                                                {{ $lead->salutation ?? 'N/A' }} / {{ $lead->first_name ?? 'N/A' }} {{ $lead->last_name ?? 'N/A' }}
                                            </td>
                                            <td class="p-4 w-1/4">{{ $lead->email ?? 'N/A' }}</td>
                                            <td class="p-4 w-1/4"  :class="{
                                                                    'text-blue-600': {{ $lead->lead_status}} === 'new',
                                                                    'text-yellow-600': {{ $lead->lead_status}} === 'working',
                                                                    'text-green-600': {{ $lead->lead_status}} === 'nurturing',
                                                                    'text-purple-600': {{ $lead->lead_status}} === 'qualified',
                                                                    'bg-red-600': {{ $lead->lead_status}} === 'unqualified'
                                                                }" >
                                                {{ $lead->lead_status ?? 'N/A' }}</td>
                                            <td class="p-4 w-1/4">{{ $lead->birthday ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>

                                            <td colspan="5" class="text-center p-4">
                                                <img class="h-auto max-w-80 m-auto rounded-lg" src="{{ asset('assets/img/no_items.jpg') }}" alt="">
                                                No leads found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="h-10 mt-4">
                        <button
                            type="submit"
                            class="bg-teal-600 px-4 py-2 text-white rounded float-right"
                            @click.prevent="if ({{ count($selectedLeads) }} === 0) { alert('You need to select leads first'); } else { $wire.proceedToCompose() }">
                            Next
                        </button>
                    </div>
                </form>
            </div>
                <!-- Hidden input to hold the value -->

            <div x-show="step === 2" class="border p-6 rounded">


                        <form wire:submit.prevent="proceedToCompose">
                            <div class=" rounded-lg border border-gray-200  border-l-teal-600 border-l-4 dark:border-gray-700 dark:bg-gray-800 mb-5 ">
                                <div class="w-full p-4  pb-10 ">
                                    <div class="float-left flex">
                                        <h2 class="text-lg text-gray-700 ">Choose Email Template</h2>
                                    </div>
                                </div>
                            </div>

                            <div  class="flex">
                                <div class="w-3/4  mt-4 border border-gray-200 rounded-lg shadow">
                                    <div class="px-7 py-5 border-b border-gray-100">
                                        <div class="fs-5 text-gray-900 fw-bold">Email Templates Overview</div>
                                    </div>
                                    <div class="p-4">
                                        <div x-show="selectedDiv === 1" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class=" m-auto max-w-full border border-gray-400 rounded-lg shadow-lg "
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/a.0.0.1.png') }}"
                                                 alt="Image 1">

                                        </div>
                                        <div x-show="selectedDiv === 2" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="m-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/b.0.0.1.png') }}"
                                                 alt="Image 2">

                                        </div>
                                        <div x-show="selectedDiv === 3" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="m-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/c.0.0.1.png') }}"
                                                 alt="Image 3">

                                        </div>
                                        <div x-show="selectedDiv === 4" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="m-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/d.0.0.1.png') }}"
                                                 alt="Image 4">

                                        </div>
                                        <div x-show="selectedDiv === 5" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class=" m-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/e.0.0.1.png') }}"
                                                 alt="Image 5">

                                        </div>
                                        <div x-show="selectedDiv === 6" class="d-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class=" m-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 style="max-height: 500px"
                                                 src="{{ asset('assets/img/mail_template/f.0.0.1.png') }}"
                                                 alt="Image 6">

                                        </div>

                                    </div>
                                </div>
                                <div class="w-1/4 ml-2   border border-gray-200  mt-4 rounded-lg shadow">
                                    <div class="px-7 py-5 border-b border-gray-100">
                                        <div class="fs-5 text-gray-900 fw-bold">Email Templates Options</div>
                                    </div>
                                    <div class="p-4 overflow-x-auto "
                                         style="max-height: 600px">
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer   p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-400 rounded-lg shadow-lg "
                                                 src="{{ asset('assets/img/mail_template/a.0.0.1.png') }}"
                                                 @click="selectedDiv = 1"
                                                 alt="Image 1">
                                        </div>
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer  p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 src="{{ asset('assets/img/mail_template/b.0.0.1.png') }}"
                                                 @click="selectedDiv = 2"
                                                 alt="Image 2">
                                        </div>
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 src="{{ asset('assets/img/mail_template/c.0.0.1.png') }}"
                                                 @click="selectedDiv = 3"
                                                 alt="Image 3">
                                        </div>
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer  p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 src="{{ asset('assets/img/mail_template/d.0.0.1.png') }}"
                                                 @click="selectedDiv = 4"
                                                 alt="Image 4">
                                        </div>
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 src="{{ asset('assets/img/mail_template/e.0.0.1.png') }}"
                                                 @click="selectedDiv = 5"
                                                 alt="Image 5">
                                        </div>
                                        <div class="max-w-sm p-6 mt-4 cursor-pointer  p-10 bg-white border border-gray-200 rounded-lg shadow">
                                            <img class="h-auto max-w-full border border-gray-200  rounded-lg shadow-lg"
                                                 src="{{ asset('assets/img/mail_template/f.0.0.1.png') }}"
                                                 @click="selectedDiv = 6"
                                                 alt="Image 6">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="mt-5">
                                <button type="button" wire:click="goToPreviousStep" class="px-4 py-2 bg-gray-500 text-white rounded">Previous</button>

                                    <button
                                        type="submit"
                                        class="bg-teal-600 px-4 py-2 text-white rounded float-right">
                                        Next
                                    </button>
                            </div>
                        </form>
                </div>
            <div x-show="step === 3" class="border p-6 rounded">
                <form wire:submit.prevent="sendEmails">
                    <div class=" rounded-lg border border-gray-200  border-l-teal-600 border-l-4 dark:border-gray-700 dark:bg-gray-800 mb-5 ">
                        <div class="w-full p-4  pb-10 ">
                            <div class="float-left flex">
                                <h2 class="text-lg text-gray-700 ">Edit Email</h2>
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-full mt-4   border border-gray-200  mt-4 rounded-lg shadow">
                            <div class="flex justify-between px-7 py-5 border-b border-gray-100">
                                <div class="fs-5 mt-2  text-gray-900 fw-bold">Edit Email Templates</div>
                                <button  @click="showModal = true" class="text-gray-600 shadow border border-gray-200  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Preview <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4" >

                                <!-- Email Header -->
                                <div class="mt-5">
                                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Subject:</label>
                                    <input type="text" wire:model.live="subject" id="subject" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <!-- Email Body -->
                                <div class="mt-5">
                                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Body:</label>
                                    <textarea wire:model.live="body" id="body" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    {{--                            <livewire:tinymce-editor />--}}

                                </div>
                                <div class="mt-5">
                                    <label for="signature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signature:</label>
                                    <input type="text" wire:model.live="signature" id="signature" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                            <div x-show="showModal"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 transform scale-90"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-500"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-90"
                             class="fixed inset-0 flex items-center justify-center z-50 ">
                            <div class="modal-overlay fixed inset-0 bg-teal opacity-50" @click="showModal = false"></div>
                            <div class="modal-content bg-white rounded-lg p-10 border border-gray-200 shadow-gray-400 shadow">
                                <button class="float-right transition absolute top-1 border mt-1 mr-1 rounded right-2 text-teal-600 hover:text-white hover:border-teal-500 hover:bg-teal-500 "
                                        @click="showModal = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg></button>
                                <div x-show="selectedDiv === 1">
                                    @livewire('email-templates.a-template', [
                                    'subject' => $subject,
                                    'body' => $body,
                                    'signature' => $signature
                                    ])
                                </div>
                                    <div x-show="selectedDiv === 2">
                                    @livewire('email-templates.b-template')
                                </div>
                                <div x-show="selectedDiv === 3">
                                    @livewire('email-templates.c-template')
                                </div>
                                <div x-show="selectedDiv === 4">
                                    @livewire('email-templates.d-template')
                                </div>
                                <div x-show="selectedDiv === 5">
                                    @livewire('email-templates.e-template')
                                </div>
                                <div x-show="selectedDiv === 6">
                                    @livewire('email-templates.f-template')
                                </div>
                            </div>
                        </div>
                        </div>
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
</div>
