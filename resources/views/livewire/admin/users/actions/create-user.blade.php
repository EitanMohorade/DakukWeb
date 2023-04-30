<div>
    <x-button type="button" class="flex space-x-1" wire:click="$set('isOpen', true)">
        <x-heroicon-o-plus class="w-6 h-6" />
        <span class="text-sm">Añadir</span>
    </x-button>

    <x-dialog-modal wire:model='isOpen'>
        <x-slot name="title">Nuevo usuario</x-slot>
        <x-slot name="content">
            <div class="p-2">
                <x-label value="Nombre" />
                <x-input type="text" class="w-full" wire:model.defer="name" />
                <x-input-error for="name" />
            </div>
            <div class="p-2">
                <x-label value="Email" />
                <x-input type="email" class="w-full" wire:model.defer="email" />
                <x-input-error for="email" />
            </div>
            <div class="p-2">
                <x-label value="Contraseña" />
                <x-input type="password" class="w-full" wire:model.defer="password" />
                <x-input-error for="password" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('isOpen', false)">Cancelar</x-secondary-button>
                <x-button wire:click="save">Crear</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
