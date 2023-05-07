<div>
    <x-info-button type="button" wire:click="$set('openModal', true)">Ver</x-info-button>

    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">{{ $product->name }}</x-slot>
        <x-slot name="content">
            <div class="text-base">
                <ul>
                    <li>Nombre: {{ $product->name }}</li>
                </ul>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
