<div class="relative flex flex-col min-w-0 break-words w-full mb-6">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
            <input type="text" placeholder="Buscar..." wire:model="search" class="border-0 rounded-lg w-1/3">
        </div>
    </div>
    <div class="block w-full overflow-x-auto rounded-t-xl bg-sky-100 shadow-lg">
        <x-table.table>
            <x-slot:head>
                <x-table.cell :align="'left'" sortable>ID</x-table.cell>
                <x-table.cell :align="'left'" sortable>Nombre</x-table.cell>
                <x-table.cell :align="'left'" sortable>Apellido</x-table.cell>
                <x-table.cell :align="'left'" sortable>Email</x-table.cell>
                <x-table.cell :align="'left'">Estado</x-table.cell>
                <x-table.cell :align="'center'">Acciones</x-table.cell>
                </x-slot>
                <x-slot:body>
                    @if (!$users->isEmpty())
                        @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-gray-100" wire:loading.class="opacity-75">
                                <x-table.cell>{{ $user->id }}</x-table.cell>
                                <x-table.cell>{{ $user->name }}</x-table.cell>
                                <x-table.cell>{{ $user->surname }}</x-table.cell>
                                <x-table.cell>{{ $user->email }}</x-table.cell>
                                <x-table.cell>
                                    <span
                                        class="inline-flex items-center bg-{{ $user->status_color }}-100 text-{{ $user->status_color }}-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 mr-1 bg-{{ $user->status_color }}-500 rounded-full"></span>
                                        {{ $user->deleted_at ? 'Inactivo' : 'Activo' }}
                                    </span>
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="flex justify-end">
                                        @if ($user->deleted_at)
                                            <a href="{{ route('users.restore', $user->id) }}"
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900"
                                                title="Restaurar">Restaurar</a>
                                        @else
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                title="Editar">Editar</a>
                                            <a href="{{ route('users.destroy', $user->id) }}"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                title="Eliminar">Eliminar</a>
                                        @endif
                                    </div>
                                </x-table.cell>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <div
                                    class="w-full h-52 bg-white text-center p-4 flex align-center justify-center items-center space-x-3 text-xl text-gray-500">
                                    <x-heroicon-o-information-circle class="w-10 h-10" />
                                    <span>Sin resultados.</span>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </x-slot>
        </x-table.table>
    </div>
    <div class="p-4 bg-sky-100 rounded-b-xl">
        {{ $users->links() }}
    </div>
</div>
