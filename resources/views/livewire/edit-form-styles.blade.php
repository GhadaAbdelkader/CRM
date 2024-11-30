<div class="w-1/4 bg-gray-200 p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Edit Field Styles</h3>
    <p>{{ $selectedElement }}</p>
    <p>{{$fontSize}}{{$fontColor}}{{$padding}}</p>

    @if($selectedElement === 'text')
        <div>
            <label class="block mb-2 text-sm font-bold">Font Size</label>
            <input type="number" wire:model.live="fontSize" class="w-full px-2 py-1 border rounded">

            <label class="block mb-2 text-sm font-bold">Font Color</label>
            <input type="color" wire:model.live="fontColor" class="w-full px-2 py-1 border rounded">

            <label class="block mb-2 text-sm font-bold">Padding</label>
            <input type="text" wire:model.live="padding" class="w-full px-2 py-1 border rounded">
        </div>
    @elseif($selectedElement === 'email')
        <div>
            <label class="block mb-2 text-sm font-bold">Font Size</label>
            <input type="number" wire:model="fontSize" class="w-full px-2 py-1 border rounded">

            <label class="block mb-2 text-sm font-bold">Font Color</label>
            <input type="color" wire:model="fontColor" class="w-full px-2 py-1 border rounded">
        </div>
    @elseif($selectedElement === 'label')
        <div>
            <label class="block mb-2 text-sm font-bold">Text</label>
            <input type="text" wire:model="labelText" class="w-full px-2 py-1 border rounded">

            <label class="block mb-2 text-sm font-bold">Font Size</label>
            <input type="number" wire:model="fontSize" class="w-full px-2 py-1 border rounded">

            <label class="block mb-2 text-sm font-bold">Font Color</label>
            <input type="color" wire:model="fontColor" class="w-full px-2 py-1 border rounded">
        </div>
    @endif
</div>
