<div class="p-4 bg-white border rounded min-h-[300px] relative">
    <h3 class="text-lg font-bold mb-4">Form Preview</h3>
    <div>
        @foreach($elements as $index => $element)
            <div
                class="p-2 border mb-2"
                wire:click="$emit('selectElement', {{ $index }})">
                @if($element['type'] === 'text')
                    <input type="text" placeholder="Text Input" class="border p-1 w-full">
                @elseif($element['type'] === 'button')
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Button</button>
                @endif
            </div>
        @endforeach
    </div>
</div>
