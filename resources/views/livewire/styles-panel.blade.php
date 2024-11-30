<div class="p-4 bg-gray-100">
    <h3 class="text-lg font-bold mb-4">Properties</h3>
    @if($selectedElement !== null)
        <div>
            <label class="block mb-2">Text:</label>
            <input
                type="text"
                class="border p-1 w-full"
                wire:model="elements.{{ $selectedElement }}.properties.text">
        </div>
    @else
        <p>Select an element to edit properties.</p>
    @endif
</div>
