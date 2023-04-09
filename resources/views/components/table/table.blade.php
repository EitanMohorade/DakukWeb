<table class="items-center bg-transparent w-full border-">
    <thead>
        <tr class="bg-sky-200 text-blueGray-700 text-xl">
            @foreach ($headers as $header)
                <x-table.header :align="'left'">{{ $header }}</x-table.header>
            @endforeach
            <x-table.header :align="'center'">Acciones</x-table.header>
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
