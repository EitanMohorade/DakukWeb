<div>
    <x-button type="button" class="flex space-x-1" wire:click="handleEdit({{ $order->id }})">
        <x-heroicon-o-plus class="w-4 h-4" />
        <span>Comentar</span>
    </x-button>

    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">Agregar comentario</x-slot>
        <x-slot name="content">
            <div class="p-2">
                <x-label value="Comentario" />
                <x-input type="text" class="w-full" wire:model.defer="comments" :value="$order->comments" />
                <x-input-error for="comments" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex space-x-2 justify-end">
                <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
                <x-button wire:click="update">Comentar</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
