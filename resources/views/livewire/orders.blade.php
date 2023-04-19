@if (session('status'))
    @php
        echo session('status');
    @endphp
@endif
<div class="relative flex flex-col min-w-0 break-words w-full mb-6">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
            <input type="text" placeholder="Buscar..." wire:model="search" class="border-0 rounded-lg w-1/3">
        </div>
    </div>
    <div class="block w-full overflow-x-auto rounded-t-xl bg-sky-100 shadow-lg">
        <x-table.table>
            <x-slot name="head">
                <x-table.header :align="'left'" sortable wire:click="sortBy('id')" :direction="$sortField == 'id' ? $sortDirection : null" value="ID">ID</x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('user_id')" :direction="$sortField == 'user_id' ? $sortDirection : null" value="Usuario">Usuario</x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('comments')" :direction="$sortField == 'comments' ? $sortDirection : null" value="Comentarios">Comentarios</x-table.header>
                <x-table.header :align="'left'">Estado</x-table.header>
                <x-table.header :align="'center'">Acciones</x-table.header>
            </x-slot>
            <x-slot name="body">
                @if (!$orders->isEmpty())
                    @foreach ($orders as $order)
                        <tr class="odd:bg-white even:bg-gray-100" wire:loading.class="opacity-75">
                            <x-table.cell>{{ $order->id }}</x-table.cell>
                            <x-table.cell>{{ $order->user_id}}</x-table.cell>
                            <x-table.cell>{{ $order->comments }}</x-table.cell>
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center bg-{{ $order->status_color }}-100 text-{{ $order->status_color }}-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 mr-1 bg-{{ $order->status_color }}-500 rounded-full"></span>
                                    {{ $order->deleted_at ? 'Inactivo' : 'Activo' }}
                                </span>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex justify-end">
                                    @if ($order->deleted_at)
                                        <form action={{ route('orders.restore', $order->id) }} method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900"
                                                title="Restaurar">Restaurar</button>
                                        </form>
                                    @else
                                        <form action={{ route('orders.destroy', $order->id) }} method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                title="Eliminar">Eliminar</button>
                                        </form>
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
        {{ $orders->links() }}
    </div>
</div>
