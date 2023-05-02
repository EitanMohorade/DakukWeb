<div>
    <x-button type="button" wire:click="$set('openModal', true)">Restaurar</x-button>

    <x-confirmation-modal wire:model='openModal'>
        <x-slot name="title">Eliminar producto</x-slot>
        <x-slot name="content">
            <div class="text-base">
                <span>¿Desea restaurar el siguiente producto?</span>
                <ul>
                    <li>Nombre: {{ $product->name }}</li>
                </ul>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                <x-button type="button" wire:click="handleRestore({{ $product->id }})">Restaurar</x-button>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
