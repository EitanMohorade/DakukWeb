<div>
    <x-danger-button type="button" wire:click="$set('openModal', true)">Eliminar</x-danger-button>

    <x-confirmation-modal wire:model='openModal'>
        <x-slot name="title">Eliminar usuario</x-slot>
        <x-slot name="content">
            <div class="text-base">
                <span>¿Desea eliminar el siguiente usuario?</span>
                <ul>
                    <li>Nombre: {{ $user->name }}</li>
                    <li>Email: {{ $user->email }}</li>
                </ul>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                <x-danger-button type="button" wire:click="handleDelete({{ $user->id }})">Eliminar</x-danger-button>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
