<!-- Define the content section -->

<div class="">
    <div class=" mx-auto ml-2 h-screen">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

<div class="container mx-auto p-4 border sm:rounded-lg border-r-indigo-50">
    @livewire('breadcrumb', ['currentPage' => 'Leads'])



    @if($isOpen)
        @include('livewire.includes.create-lead-model')
    @endif

        <div x-data="{ show: true }" x-show="show"
             x-init="setTimeout(() => show = false, 5000)"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
            @if(session('message'))
                <div class="bg-teal-100 text-teal-700 p-4 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="relative   sm:rounded-lg shadow-md py-4 border-gray-100 border h-full">

            <div class=" space-y-4 sm:space-y-0 items-center b-4 px-2">

                <div class="inline-flex rounded-md shadow-sm mb-2 float-right px-2" role="group">
                <button type="button" wire:click="create()" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    Create
                </button>
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    Settings
                </button>
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    Messages
                </button>
            </div>
                <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 px-2 w-full">
                    <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                        Last 30 days
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                     @include('livewire.includes.search-box')

                </div>
            </div>
            <div class="px-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                         Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lead Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
                </thead>
                <tbody>
                @forelse($leads as $lead)

                    <tr wire:key="{{ $lead->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $lead->salutation ?? 'N/A' }} / {{ $lead->first_name ?? 'N/A' }} {{ $lead->last_name ?? 'N/A' }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $lead->title ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->phone ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->company ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->email ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->lead_status ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->created_at ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{ $lead->id }})" class="font-medium border border-lime-500 w-8 h-8 mb-1 rounded-md dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="30px" fill="#78A75A"><path d="M404-404v-120.31l349.39-349.38q8.3-8.31 17.46-11.58 9.15-3.27 19.19-3.27 10.17 0 19.56 3.27 9.4 3.27 17.26 10.98L872.15-830q8.69 8.31 12.35 18.22 3.65 9.91 3.65 20.09 0 10.2-3.48 19.75t-11.75 17.78L522.38-404H404Zm382.31-337.08 49.46-50.23-45.23-46.38-50.23 50.61 46 46ZM228.31-164q-27.01 0-45.66-18.65Q164-201.3 164-228.31v-503.38q0-27.42 18.5-46.36Q201-797 228.31-796h335.23L324.31-556.77v232.46h230.92L796-565.08v336.77q0 27.01-18.65 45.66Q758.7-164 731.69-164H228.31Z"/></svg>
                        </button>
                        <button wire:click="delete({{ $lead->id }})" class="font-medium  border border-red-600 w-8 h-8 rounded-md dark:text-red-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="30px" fill="#EA3323"><path d="M324.31-164q-27.01 0-45.66-18.65Q260-201.3 260-228.31V-696h-48v-52h172v-43.38h192V-748h172v52h-48v467.26q0 27.74-18.65 46.24Q662.7-164 635.69-164H324.31Zm75.85-124h51.99v-336h-51.99v336Zm107.69 0h51.99v-336h-51.99v336Z"/></svg>
                        </button>
                    </td>
                </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center p-4">
                            No leads found.
                        </td>
                    </tr>
                    @endforelse
{{--                {{ $leads->links() }}--}}
                </tbody>
            </table>
                <div class="mt-4">
                    {{ $leads->links() }}
                </div>
            </div>
            </div>


</div>
        </div>
    </div>
</div>
