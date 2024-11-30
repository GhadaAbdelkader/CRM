<div class="flex p-6 space-x-4" x-data="{ draggedField: null, placeholderIndex: null, selectedElement: @entangle('selectedElement') }"
     x-on:style-updated.window="(event) => {
        const updatedElement = elements.find(el => el.type === selectedElement);
        if (updatedElement) {
            Object.assign(updatedElement, event.detail.styles); // Apply new styles to the element
        }
    }">
    <!-- Sidebar with draggable fields and layouts -->
    <div class="w-1/4 bg-white border border-gray-300 rounded rounded shadow">
{{--        <h3 class="text-lg font-semibold mb-4">Available Fields</h3>--}}
        <div class="px-7 py-5 border-b border-gray-300">
            <h3 class="fs-5 text-gray-900 text-lg font-semibold">Available Fields</h3>
            <h6 class="pt-2 text-sm font-semibold text-teal-600">Drag Element To The Right</h6>
        </div>
        <div class="bg-gray-50">
            <h6 class="px-7 pt-2 text-sm font-semibold text-gray-600">Layouts</h6>
            <ul class=" p-4 border-b border-gray-300 ">
                @foreach($layouts as $layoutType => $layoutName)
                    <li class="bg-white text-gray-600 text-center border border-gray-300  rounded-lg pt-2 cursor-pointer">
                        <div
                            draggable="true"
                            @dragstart="draggedField = { type: 'layout', layoutType: '{{ $layoutType }}' }; $el.classList.add('opacity-50', 'swing')"
                            @dragend="draggedField = null; $el.classList.remove('opacity-50', 'swing')"
                            class="py-2 px-2 text-[14px]"
                            :class="{ 'opacity-50': draggedField?.type === 'layout' && draggedField.layoutType === '{{ $layoutType }}' }"
                        >
                            @if ($layoutType === 'single')
                                <div class="flex justify-start">
                                     <span class="material-symbols-outlined pr-4 text-teal-800">
                                     drag_indicator
                                </span>
                                    <div class="w-full">
                                <div class="bg-sky-100 rounded w-full p-2 h-6"></div>
                                <p class="pt-2">1 Column</p>
                                    </div>
                                </div>
                            @elseif ($layoutType === 'double')
                                <div class="flex justify-start">
                                     <span class="material-symbols-outlined pr-4 text-teal-800">
                                     drag_indicator
                                </span>
                                    <div class="w-full">
                                <div class="grid grid-cols-2 gap-4 w-full ">
                                    <div class="bg-sky-100 rounded w-full h-6"></div>
                                    <div class="bg-sky-100 rounded w-full h-6"></div>
                                </div>
                                <p class="pt-2">2 Columns</p>
                                    </div>
                                </div>
                            @elseif ($layoutType === 'triple')
                                <div class="flex justify-start">
                                     <span class="material-symbols-outlined pr-4 text-teal-800">
                                     drag_indicator
                                </span>
                                    <div class="w-full">
                                        <div class="grid grid-cols-3 gap-4 w-full ">
                                            <div class="bg-sky-100 rounded w-full h-6"></div>
                                            <div class="bg-sky-100 rounded w-full h-6"></div>
                                            <div class="bg-sky-100 rounded w-full h-6"></div>
                                        </div>
                                        <p class="pt-2">3 Columns</p>
                                    </div>
                                </div>


                            @endif

                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="p-4 ">
                @foreach($availableFields as $type => $field)
                    <li class="flex justify-start bg-white pl-2 text-gray-600 text-left border border-gray-300  rounded-lg py-2 cursor-pointer ">
                   <span class="material-symbols-outlined pr-4 text-teal-800">
                         drag_indicator
                    </span>
                    <span class="material-symbols-outlined text-gray-500 font-normal pr-2">
                        {{ $field['icon'] }}
                    </span>
                        <button
                            draggable="true"
                            @dragstart="draggedField = { type: '{{ $type }}' }"
                            @dragend="draggedField = null; selectedElement = '{{ $type }}'; $wire.set('selectedElement', selectedElement);"
                            class=" px-2 text-[14px]"
                        >
                            {{ $field['label'] }}
                        </button>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>

    <!-- Form builder area with drop zones and placeholders for flexibility -->
    <div x-data="{ elements: @entangle('elements')}" class="w-2/3 bg-white p-6 rounded shadow"
         @dragover.prevent
         @drop.prevent="if (draggedField) { $wire.addElement(draggedField, placeholderIndex); draggedField = null; placeholderIndex = null; }">
        <h3 class="text-lg font-semibold mb-4">Form Preview</h3>

        @foreach($elements as $index => $element)
            <div class="h-6  rounded mb-2 cursor-pointer"
                 @dragover.prevent="placeholderIndex = {{ $index }}"
                 @dragleave="placeholderIndex = null"
                 @drop.prevent="if (draggedField) { $wire.addElement(draggedField, placeholderIndex); draggedField = null; placeholderIndex = null; }"></div>

            <div x-show="elements[{{ $index }}].type !== 'layout'"
                 class="relative mb-4 items-center"
                 :class="{ 'border border-2 border-dashed border-teal-400': selectedElement === '{{ $element['id'] }}' }"
                 draggable="true"
                 x-data="{ isEditing: false, selectedElement: null, value: '{{ $element['value'] ?? '' }}' }"
                 @click.away="isEditing = false; selectedElement = null">

                @if ($element['type'] === 'text')
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input id="text" type="text"
                           placeholder="Text Input"
                           class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:border-0 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-transparent dark:focus:border-transparent"
                           @click.stop="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement)"
                    />
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
                @elseif ($element['type'] === 'email')
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input id="email" type="email" placeholder="Email Input" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement); "
                    />
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
                @endif
                <button x-show="selectedElement === '{{ $element['id'] }}'"
                        wire:click="removeElement('{{ $element['id'] }}')"
                        class="absolute top-[-23px] text-sm text-teal-400 right-0.5  rounded  bg-white p-2">
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                </button>
            </div>

            <div x-show="elements[{{ $index }}].type === 'layout'" class="border rounded layout"
                 :class="{ 'border-2 border-dashed border-teal-400': selectedElement === '{{ $element['id'] }}' }"
                 @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', '{{ $element['id'] }}')"
                 draggable="true"
                 x-data="{ isEditing: false, selectedElement: null, value: '{{ $element['value'] ?? '' }}' }"
                 @click.away="isEditing = false; selectedElement = null">
                <div class="dynamic-field">
                    @if($element['type'] === 'layout')
                        <div class="grid gap-4" :class="`grid-cols-${elements[{{ $index }}].layoutType === 'single' ? 1 : (elements[{{ $index }}].layoutType === 'double' ? 2 : 3)}`">
                            @foreach($element['sections'] as $sectionIndex => $section)
                                <div class="relative p-2 rounded section"
                                     @drop.prevent="if (draggedField && draggedField.type !== 'layout') { $wire.call('addFieldToSection', {{ $index }}, {{ $sectionIndex }}, draggedField.type); draggedField = null; }"
                                     @click.away=" selectedElement = null"
                                >
                                    @if (empty($section['fields']) || count($section['fields']) === 0)

                                    <div class="text-teal-700 h-[100px] w-full align-center flex text-center" style=" background-color: rgba(4, 116, 129, 0.08);">
                                            <span class="m-auto">Drop Content</span>
                                        </div>
                                    @endif
                                    @foreach($section['fields'] ?? [] as $fieldIndex => $field)
                                        <div class="mt-2 p-2 bg-white  flex justify-between items-center">
                                            <div  class="mb-4  w-full">
                                                @if ($field['type'] === 'text')
                                                        <lable class="mb-2">lable</lable>
                                                        <input type="text" placeholder="Text Input" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                               @click.stop="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement)"
                                                        />
                                                @elseif ($field['type'] === 'email')
                                                    <lable class="mb-2">lable</lable>
                                                    <input type="email" placeholder="Email Input" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                           @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    />
                                                @elseif ($field['type'] === 'image')
                                                    <lable class="mb-2">lable</lable>
                                                    <input type="file" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                           @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    />
                                                @elseif ($field['type'] === 'label')
                                                    <span
                                                        @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >{{ $field['label'] }}</span>
                                                @elseif ($field['type'] === 'textarea')
                                                    <label for="textarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <textarea id="textarea"  name="textarea" rows="4" cols="50" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                              @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    ></textarea>
                                                @elseif ($field['type'] === 'select')
                                                    <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <select id="select" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                        @foreach($field['options'] as $option)
                                                            <option value="{{ $option }}">{{ $option }}</option>
                                                        @endforeach
                                                    </select>

                                                @elseif ($field['type'] === 'date')
                                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input id="date" type="date" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                @elseif ($field['type'] === 'file')
                                                    <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input id="file" type="file" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                @elseif ($field['type'] === 'time')
                                                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input id="time" type="time" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                @elseif ($field['type'] === 'number')
                                                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input id="number" type="number" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                @elseif ($field['type'] === 'checkbox')
                                                    <label for="checkbox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input id="checkbox" type="checkbox" class=" py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    @click="selectedElement = '{{ $field['type'] }}'; $wire.set('selectedElement', selectedElement);"
                                                    >
                                                    <span>Checkbox Option</span> <!-- Label can be dynamic if needed -->
                                                @endif

                                            </div>
                                            <button x-show="selectedElement === '{{ $element['type'] }}'"
                                                wire:click="removeFieldFromSection({{ $index }}, {{ $sectionIndex }}, {{ $fieldIndex }})"
                                                    class="absolute top-[-23px] text-sm text-teal-400 right-0.5  rounded  bg-white p-2">
                                                <span class="material-symbols-outlined">
                        delete
                    </span></button>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                                <button x-show="selectedElement === '{{ $element['id'] }}'"
                                        wire:click="removeElement('{{ $element['id'] }}')"
                                        class="absolute top-[-23px] text-sm text-teal-400 right-0.5  rounded  bg-white p-2">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                </button>


                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="h-6 rounded cursor-pointer"
             @dragover.prevent="placeholderIndex = {{ count($elements) }}"
             @dragleave="placeholderIndex = null"
             @drop.prevent="if (draggedField) { $wire.call('addElement', draggedField, placeholderIndex); draggedField = null; placeholderIndex = null; }"></div>
    </div>

    <p>{{$selectedElement}}</p>
    <!-- Sidebar for editing selected element styles -->
{{--    @livewire('edit-form-styles', [$selectedElement])--}}
{{--    <livewire:edit-form-styles :$selectedElement />--}}
</div>
