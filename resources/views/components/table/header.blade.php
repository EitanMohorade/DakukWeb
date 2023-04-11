<th class="px-6 align-middle py-3 text-base uppercase whitespace-nowrap font-semibold text-{{ $align }}">
    {{ $slot }}
    @if ($attributes->has('sortable'))
        <x-heroicon-o-chevron-down class="w-6 h-6" />
    @endif
</th>
