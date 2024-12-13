<div class="flex p-6 space-x-4" x-data="{ draggedField: null, placeholderIndex: null, selectedElement: @entangle('selectedElement') }"
     x-on:style-updated.window="(event) => {
        const updatedElement = elements.find(el => el.type === selectedElement);
        if (updatedElement) {
            Object.assign(updatedElement, event.detail.styles); // Apply new styles to the element
        }
    }">
    <!-- Sidebar with draggable fields and layouts -->
    <div class=" w-1/4  bg-white border border-gray-300 rounded rounded shadow ">
{{--        <h3 class="text-lg font-semibold mb-4">Available Fields</h3>--}}
        <div class="px-7 py-5 border-b border-gray-300">
            <h3 class="fs-5 text-gray-900 text-lg font-semibold">Available Fields</h3>
            <h6 class="pt-2 text-sm font-semibold text-teal-600">Drag Element To The Right</h6>
        </div>
        <div class="scrollable bg-gray-50 h-[500px] overflow-auto">
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
        <p>{{$selectedElement}}</p>
        <h3 class="text-lg font-semibold mb-4">Form Preview</h3>

        @foreach($elements as $index => $element)
            <p>{{ $element['id'] ?? 'No ID' }}</p>
            <div class=" border border-white mb-2 cursor-pointer hover:border-2  hover:border-teal-400"
                 @dragover.prevent="placeholderIndex = {{ $index }}"
                 @dragleave="placeholderIndex = null"
                 @drop.prevent="if (draggedField) { $wire.addElement(draggedField, placeholderIndex); draggedField = null; placeholderIndex = null; }"></div>

            <div x-show="elements[{{ $index }}].type !== 'layout'"
                 class="relative mb-4 items-center hover:border-2 hover:border-dashed hover:border-teal-400"
                 :class="{ 'border border-2 border-dashed border-teal-400': selectedElement === '{{ $element['id'] }}' }"
                 draggable="true"
                 x-data="{ isEditing: false, selectedElement: null, showModal: false, value: '{{ $element['value'] ?? '' }}' }"
                 @click.away="isEditing = false; selectedElement = null">

                @if ($element['type'] === 'text')
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ $element['label'] ?? 'Default Label' }}</label>
                    <input id="text" type="text"
                           placeholder="Text Input"
                           class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:border-0 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-transparent dark:focus:border-transparent"
                           :required="selectedElement === '{{ $element['id'] }}' && $wire.get('elements.{{ $index }}.required', false)"
                           @click.stop="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement)"
                    />
{{--                @elseif ($element['type'] === 'select')--}}
{{--                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ $element['label'] ?? 'Default Label' }}</label>--}}
{{--                    <select id="select" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                            @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement);">--}}
{{--                        @foreach($element['options'] as $option)--}}
{{--                            <option value="{{ $option }}">{{ $option }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                @endif
                <button x-show="selectedElement === '{{ $element['id'] }}'"
                        wire:click="removeElement('{{ $element['id'] }}'); selectedElement = null"
                        class="absolute top-[-23px] text-sm text-teal-400 right-0.5  rounded  bg-white p-2">
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                </button>
                    <button x-show="selectedElement === '{{ $element['id'] }}'"
                            @click="showModal = true"
                            class="absolute top-[-23px] text-sm text-teal-400 right-9  rounded  bg-white p-2">
                        Ed
                    </button>
                    <div x-show="showModal"
                         class="fixed z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
                         @click.away="showModal = false">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-medium mb-4 text-center">Edit Field</h2>

                            <!-- تعديل النص -->
                            <label for="edit-label" class="block mb-2 text-sm font-medium text-gray-700">Label Text</label>
                            <input id="edit-label" type="text"
                                   x-bind:value="$wire.get('elements.{{ $index }}.label')"
                                   @input="$wire.set('elements.{{ $index }}.label', $event.target.value)"
                                   class="block w-full py-1.5 bg-gray-50 border border-gray-300 rounded-lg mb-4" />

                            <!-- إضافة Required -->
                            <div class="flex items-center mb-4">
                                <input id="required-checkbox" type="checkbox"
                                       :checked="$wire.get('elements.{{ $index }}.required', false)"
                                       @change="$wire.set('elements.{{ $index }}.required', $event.target.checked)"
                                       class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                                <label for="required-checkbox" class="ml-2 text-sm font-medium text-gray-700">Required</label>
                            </div>

                            <!-- زر الحفظ -->
                            <button @click="showModal = false"
                                    class="px-2 py-2 bg-teal-600 text-white rounded-lg float-end">
                                Save
                            </button>
                        </div>
                    </div>
            </div>

            <div x-show="elements[{{ $index }}] && elements[{{ $index }}].type === 'layout'" class="relative border rounded layout hover:border-2 hover:border-dashed hover:border-teal-400"
                 :class="{ 'border-2 border-dashed border-teal-400': selectedElement === '{{ $element['id'] }}' }"
                 @click="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', '{{ $element['id'] }}')"
                 draggable="true"
                 x-data="{ isEditing: false, selectedElement: null, showModal: false, value: '{{ $element['value'] ?? '' }}' }"
                 @click.away="isEditing = false; selectedElement = null">
                <div class="dynamic-field">
                    @if($element['type'] === 'layout')
                        <div class="grid gap-4" :class="`grid-cols-${elements[{{ $index }}].layoutType === 'single' ? 1 : (elements[{{ $index }}].layoutType === 'double' ? 2 : 3)}`">
                            @foreach($element['sections'] as $sectionIndex => $section)
                                <div class="relative p-2 rounded section"
                                     @drop.prevent="if (draggedField && draggedField.type !== 'layout') { $wire.call('addFieldToSection', {{ $index }}, {{ $sectionIndex }}, draggedField.type); draggedField = null; }"
                                >
                                    @if (empty($section['fields']) || count($section['fields']) === 0)

                                    <div class="text-teal-700 h-[100px] w-full align-center flex text-center" style=" background-color: rgba(4, 116, 129, 0.08);"
                                         @click.stop="selectedElement = '{{ $element['id'] }}'; $wire.set('selectedElement', selectedElement)">
                                            <span class="m-auto">Drop Content</span>
                                        </div>
                                    @endif
                                    @foreach($section['fields'] ?? [] as $fieldIndex => $field)
                                            <p>{{ $field['required'] ?? 'No required' }}</p>

                                            <div class="relative mt-2 p-2 bg-white  flex justify-between items-center hover:border-2 hover:border-dashed hover:border-teal-400"
                                             :class="{ 'border border-2 border-dashed border-teal-400': selectedElement === '{{ $field['id'] }}' }"
                                             @click.away="isEditing = false; selectedElement = null">
                                            <div  class="mb-4  w-full">
                                                @if ($field['type'] === 'text')
                                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ $field['label'] ?? 'Default Label' }}</label>
                                                    <input type="text" placeholder="Text Input"
                                                           class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                           :required="selectedElement === '{{ $element['id'] }}' && $wire.set('elements.{{ $index }}.sections[{{ $sectionIndex }}].fields[{{ $fieldIndex }}].required', false)"
                                                           @click.stop="selectedElement = '{{ $field['id'] }}'; $wire.set('selectedElement', selectedElement)">

                                                    {{--                                                @elseif ($field['type'] === 'select')--}}

{{--                                                    <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $elements[$index]['fields'][$fieldIndex]['type'] ?? 'Default lable' }}</label>--}}
{{--                                                    <select id="select" class="w-full py-1.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                                                            @click.stop="selectedElement = '{{ $field['id'] }}'; $wire.set('selectedElement', selectedElement)"--}}
{{--                                                            :required="$wire.get(`elements.{{ $index }}.required`, false)"--}}
{{--                                                            @input="$wire.set(`elements.{{ $index }}.fields[{{ $fieldIndex }}].value`, $event.target.value)"--}}
{{--                                                    >--}}
{{--                                                        @foreach($element['options'] as $option)--}}
{{--                                                            <option value="{{ $option }}">{{ $option }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
                                                @endif
                                            </div>
                                            <button x-show="selectedElement === '{{ $field['id'] }}'"
                                                wire:click="removeFieldFromSection({{ $index }}, {{ $sectionIndex }}, {{ $fieldIndex }}); selectedElement = null"
                                                    class="absolute top-[-23px] text-sm text-teal-400 right-0.5  rounded  bg-white p-2">
                                                    <span class="material-symbols-outlined">
                                                        delete
                                                    </span>
                                            </button>
                                            <button x-show="selectedElement === '{{ $field['id'] }}'"
                                                    @click="showModal = true"
                                                    class="absolute top-[-23px] text-sm text-teal-400 right-9  rounded  bg-white p-2">
                                                Ed
                                            </button>
                                            <div x-show="showModal"
                                                 class="fixed z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
                                                 @click.away="showModal = false">
                                                <div class="bg-white rounded-lg shadow p-6" @click.stop>
                                                    <h2 class="text-lg font-medium mb-4 text-center">Edit Field</h2>
                                                    <button @click="$wire.call('debug')">Debug</button>
                                                    <!-- تعديل النص -->
                                                    <label for="edit-label" class="block mb-2 text-sm font-medium text-gray-700">Label Text</label>
                                                    <input id="edit-label" type="text"
                                                           x-model="$wire.get('elements.{{ $index }}.sections.{{ $sectionIndex }}.fields.{{ $fieldIndex }}.label')"
                                                           @input="$wire.set('elements.{{ $index }}.sections.{{ $sectionIndex }}.fields.{{ $fieldIndex }}.label', $event.target.value)"
                                                           value="{{ $field['label'] ?? 'Default Label' }}"
                                                           class="block w-full py-1.5 bg-gray-50 border border-gray-300 rounded-lg mb-4" />
                                                    <!-- إضافة Required -->
                                                    <div class="flex items-center mb-4">
                                                        <input id="require-checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded" type="checkbox"
                                                               :checked="$wire.get('elements.{{ $index }}.sections[{{ $sectionIndex }}].fields[{{ $fieldIndex }}].required', false)"
                                                               @change="$wire.call('updateField', {{ $index }}, {{ $sectionIndex }}, {{ $fieldIndex }}, 'required', $event.target.checked)">
                                                        <label for="require-checkbox" class="ml-2 text-sm font-medium text-gray-700">Required</label>
                                                    </div>
                                                    <!-- عرض الخيارات إذا كان نوع الحقل select -->
{{--                                                    <div x-show="$wire.elements[{{ $layoutIndex }}].sections[{{ $sectionIndex }}].fields[{{ $fieldIndex }}].type === 'select'" class="mb-4">--}}
{{--                                                        <label class="block mb-2 text-sm font-medium text-gray-700">Options</label>--}}

{{--                                                        <!-- عرض الخيارات الحالية -->--}}
{{--                                                        <ul class="mb-2">--}}
{{--                                                            <template x-for="(option, optionIndex) in $wire.elements[{{ $layoutIndex }}].sections[{{ $sectionIndex }}].fields[{{ $fieldIndex }}].options" :key="optionIndex">--}}
{{--                                                                <li class="flex items-center mb-1">--}}
{{--                                                                    <input type="text"--}}
{{--                                                                           x-model="$wire.elements[{{ $layoutIndex }}].sections[{{ $sectionIndex }}].fields[{{ $fieldIndex }}].options[optionIndex]"--}}
{{--                                                                           class="block w-full py-1 px-2 bg-gray-50 border border-gray-300 rounded-lg mr-2" />--}}
{{--                                                                    <button @click.prevent="$wire.call('removeOption', {{ $layoutIndex }}, {{ $sectionIndex }}, {{ $fieldIndex }}, optionIndex)"--}}
{{--                                                                            class="text-red-600 text-sm">Remove</button>--}}
{{--                                                                </li>--}}
{{--                                                            </template>--}}
{{--                                                        </ul>--}}

                                                        <!-- إضافة خيار جديد -->
{{--                                                        <button @click.prevent="$wire.call('addOption', {{ $layoutIndex }}, {{ $sectionIndex }}, {{ $fieldIndex }})"--}}
{{--                                                                class="px-2 py-1 bg-blue-600 text-white rounded-lg text-sm">Add Option</button>--}}
{{--                                                    </div>--}}

                                                    <!-- زر الحفظ -->
                                                    <button @click.prevent="showModal = false"
                                                            class="px-2 py-2 bg-teal-600 text-white rounded-lg float-end">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                                <button x-show="selectedElement === '{{ $element['id'] }}'"
                                        wire:click="removeLayout('{{ $element['id'] }}'); selectedElement = null"
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

        <div class=" cursor-pointer border border-white mb-2 cursor-pointer hover:border-2  hover:border-teal-400"
             @dragover.prevent="placeholderIndex = {{ count($elements) }}"
             @dragleave="placeholderIndex = null"
             @drop.prevent="if (draggedField) { $wire.call('addElement', draggedField, placeholderIndex); draggedField = null; placeholderIndex = null; }"></div>
    </div>


{{--    <div class="w-1/4 bg-white border border-gray-300 rounded shadow">--}}
{{--        <div class="px-7 py-5 border-b border-gray-300">--}}
{{--            <h3 class="fs-5 text-gray-900 text-lg font-semibold">Available Styles</h3>--}}
{{--            <h6 class="pt-2 text-sm font-semibold text-teal-600">Select Element To Style It</h6>--}}
{{--        </div>--}}

{{--        --}}{{-- Form to apply styles --}}
{{--        <div class="p-4">--}}
{{--            <label class="block mb-2 text-sm font-bold">Font Size</label>--}}
{{--            <input type="number" wire:model="fontSize" class="w-full px-2 py-1 border rounded" placeholder="e.g., 16px">--}}

{{--            <label class="block mb-2 text-sm font-bold">Font Color</label>--}}
{{--            <input type="color" wire:model="fontColor" class="w-full px-2 py-1 border rounded">--}}

{{--            <label class="block mb-2 text-sm font-bold">Font Weight</label>--}}
{{--            <select wire:model="fontWeight" class="w-full px-2 py-1 border rounded">--}}
{{--                <option value="normal">Normal</option>--}}
{{--                <option value="bold">Bold</option>--}}
{{--                <option value="lighter">Lighter</option>--}}
{{--            </select>--}}

{{--            <label class="block mb-2 text-sm font-bold">Text Align</label>--}}
{{--            <select wire:model="textAlign" class="w-full px-2 py-1 border rounded">--}}
{{--                <option value="left">Left</option>--}}
{{--                <option value="center">Center</option>--}}
{{--                <option value="right">Right</option>--}}
{{--            </select>--}}

{{--            <label class="block mb-2 text-sm font-bold">Text Decoration</label>--}}
{{--            <select wire:model="textDecoration" class="w-full px-2 py-1 border rounded">--}}
{{--                <option value="none">None</option>--}}
{{--                <option value="underline">Underline</option>--}}
{{--                <option value="line-through">Line Through</option>--}}
{{--                <option value="overline">Overline</option>--}}
{{--            </select>--}}

{{--            <label class="block mb-2 text-sm font-bold">Line Height</label>--}}
{{--            <input type="number" wire:model="lineHeight" class="w-full px-2 py-1 border rounded" placeholder="e.g., 1.5">--}}
{{--        </div>--}}
{{--    </div>--}}



    <!-- Sidebar for editing selected element styles -->
{{--    @livewire('edit-form-styles', [$selectedElement])--}}
{{--    <livewire:edit-form-styles :$selectedElement />--}}
</div>
