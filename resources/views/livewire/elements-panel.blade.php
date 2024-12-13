<div class="p-4 bg-gray-200">
    <h3 class="text-lg font-bold mb-4">Elements</h3>
    <div>
        <button
            class="bg-blue-500 text-white p-2 rounded mb-2 block"
            wire:click="$emit('addElement', 'text')">Text Input</button>
        <button
            class="bg-green-500 text-white p-2 rounded mb-2 block"
            wire:click="$emit('addElement', 'button')">Button</button>
    </div>
</div>
{{--                    <p x-show="!isEditing"--}}
{{--                       class="w-full px-2 py-1  rounded cursor-pointer text-center font-bold"--}}
{{--                       @click="isEditing = true"--}}
{{--                       :style="{ fontSize: fontSize + 'px', color: fontColor, padding: padding + 'px' }"--}}
{{--                       >--}}
{{--                        <span x-text="value || 'Click to edit {{$fontsize}}{{$fontcolor}}{{$padding}}'"></span>--}}
{{--                    </p>--}}

{{--                    <input type="text" placeholder="Text Input" class="w-full px-2 py-1 border rounded"--}}
{{--                           x-show="isEditing"--}}
{{--                           x-model="value"--}}
{{--                           @click="selectedElement = '{{ $element['type'] }}'; $wire.set('selectedElement', selectedElement);"--}}
{{--                           @keydown.enter="isEditing = false"--}}
{{--                           @blur="isEditing = false"--}}
{{--                           wire:model="fontSize"--}}
{{--                    />--}}

@elseif ($element['type'] === 'image')
    <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="email" type="file" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);"
    />
@elseif ($element['type'] === 'label')
    <span
        @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);"
    >{{ $element['label'] }}</span>
@elseif ($element['type'] === 'textarea')
    <label for="textarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <textarea id="textarea"  name="textarea" rows="4" cols="50" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);"
    >
                    </textarea>
@elseif ($element['type'] === 'select')
    <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <select id="select" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
        @foreach($element['options'] as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>

@elseif ($element['type'] === 'date')
    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="date" type="date" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
@elseif ($element['type'] === 'file')
    <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="file" type="file" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
@elseif ($element['type'] === 'time')
    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="time" type="time" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
@elseif ($element['type'] === 'number')
    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="number" type="number" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
@elseif ($element['type'] === 'checkbox')
    <label for="checkbox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input id="checkbox" type="checkbox" class="py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">
    <span>Checkbox Option</span> <!-- Label can be dynamic if needed -->
