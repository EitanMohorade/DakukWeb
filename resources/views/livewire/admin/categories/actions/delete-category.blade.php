<div>
    <x-danger-button type="button" wire:click="$set('openModal', true)">Eliminar</x-danger-button>

    <x-confirmation-modal wire:model='openModal'>
        <x-slot name="title">Eliminar categoria</x-slot>
        <x-slot name="content">
            <div class="text-base">
                <span>¿Desea eliminar la siguiente categoria?</span>
                <ul>
                    <li>Nombre: {{ $category->name }}</li>
                </ul>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                <x-danger-button type="button" wire:click="handleDelete({{ $category->id }})">Eliminar</x-danger-button>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
