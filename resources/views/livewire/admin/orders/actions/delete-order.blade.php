<div>
    <x-danger-button type="button" wire:click="$set('openModal', true)">eliminar</x-danger-button>

    <x-confirmation-modal wire:model='openModal'>
        <x-slot name="title">Eliminar orden</x-slot>
        <x-slot name="content">
            <div class="text-base">
                <span>¿Desea restaurar la siguiente orden?</span>
                <ul>
                    <li>ID: {{ $order->id }}</li>
                </ul>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                <x-danger-button type="button" wire:click="handleRestore({{ $order->id }})">Eliminar</x-danger-button>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
