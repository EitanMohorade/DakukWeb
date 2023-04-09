<div>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />

    <section class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-8">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-200 w-full mb-6 shadow-lg rounded ">
{{--                 <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">Usuarios</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <input type="text" placeholder="Search..." wire:model="search">
                        </div>
                    </div>
                </div> --}}

                <div class="block w-full overflow-x-auto rounded-xl">
                    <x-table.table :headers="['ID', 'Nombre', 'Apellido', 'Email', 'Acciones']">
                        @if (!$users->isEmpty())
                            @foreach ($users as $user)
                                <tr class="odd:bg-white even:bg-gray-100">
                                    <x-table.cell>{{ $user->id }}</x-table.cell>
                                    <x-table.cell>{{ $user->name }}</x-table.cell>
                                    <x-table.cell>{{ $user->surname }}</x-table.cell>
                                    <x-table.cell>{{ $user->email }}</x-table.cell>
                                    <x-table.cell>
                                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                        Available
                                        </span>
                                    </x-table.cell>
                                        <x-table.cell>
                                            <a href="{{ route('users.edit', $user->id) }}" title="Editar"><button
                                                    class="btn btn-primary">Editar</button></a>
                                            <a href="{{ route('users.destroy', $user->id) }}" title="Eliminar"><button
                                                    class="btn btn-primary">Eliminar</button>
                                        </x-table.cell>
                                </tr> @endforeach
@else
<td class="border-t-0
        px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
    No se han encontrado usuarios
    </td>
    @endif
    </x-table.table>
</div>
</div>
</div>

</section>
</div>
