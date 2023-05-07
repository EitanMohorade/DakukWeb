<div>
    <x-button type="button" class="flex space-x-1" wire:click="handleEdit({{ $category->id }})">
        <x-heroicon-o-pencil class="w-4 h-4" />
        <span>Editar</span>
    </x-button>

    <x-dialog-modal wire:model='openModal'>
                <x-slot name="title">Editar categoria</x-slot>
                <x-slot name="content">
                    <div class="p-2">
                        <x-label value="Nombre" />
                        <x-input type="text" class="w-full" wire:model.defer="name" :value="$category->name"/>
                        <x-input-error for="name" />
                    </div>
                <x-slot name="footer">
                    <div class="flex space-x-2 justify-end">
                        <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                        <x-button wire:click="update">Editar</x-button>
                    </div>
                </x-slot>
    </x-dialog-modal>
</div>
