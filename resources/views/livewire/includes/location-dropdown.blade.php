<div>
    <div class="mb-5">
        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
        <select wire:model.live="form.country" id="country"   class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <option value="">Select a country</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        @error('form.country')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="mb-5">
        <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
        <select wire:model.live="form.state_province"  id="state"     class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <option value="">Select a state</option>
            @foreach ($states as $state)
                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
            @endforeach
        </select>
        @error('form.state_province')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="mb-5">
        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
        <select wire:model.defer="form.city" id="city"    class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <option value="">Select a city</option>
            @foreach ($cities as $city)
                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
            @endforeach
        </select>
        @error('form.city')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>
</div>
