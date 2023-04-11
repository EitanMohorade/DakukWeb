<table class="items-center bg-transparent w-full">
    <thead>
        <tr class="bg-sky-100 text-gray-600 text-xl">
            {{ $head }}
            {{--         <tr class="bg-sky-100 text-gray-600 text-xl">
            @foreach ($headers as $header)
                <x-table.header :align="'left'">{{ $header }}</x-table.header>
            @endforeach
            <x-table.header :align="'center'">Acciones</x-table.header>
        </tr> --}}
        </tr>
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
</table>
