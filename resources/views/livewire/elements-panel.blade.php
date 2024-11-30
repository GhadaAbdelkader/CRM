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
