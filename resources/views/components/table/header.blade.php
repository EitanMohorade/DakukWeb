<th class="px-6 align-middle py-3 text-base uppercase whitespace-nowrap font-semibold text-{{ $align }}">
    @if ($attributes->has('sortable'))
        <button class="group inline-flex space-x-2" title="Ordenar por {{ $attributes->get('value') }}" {{ $attributes->only('wire:click')->merge()}}>
            <span class="uppercase">{{ $slot }}</span>
            @if ($attributes->get('direction') == 'asc')
                <x-heroicon-o-chevron-up class="w-6 h-6 opacity-0 group-hover:opacity-100" />
            @else
                <x-heroicon-o-chevron-down class="w-6 h-6 opacity-0 group-hover:opacity-100" />
            @endif
        </button>
    @else
        {{ $slot }}
    @endif
</th>
