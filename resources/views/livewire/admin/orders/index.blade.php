@if (session('status'))
    @php
        echo session('status');
    @endphp
@endif
<div class="relative flex flex-col min-w-0 break-words w-full mb-6">
    <div class="w-full flex rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex space-x-4">
            <x-dropdown align="top" contentClasses="flex flex-col" width='20'>
                <x-slot name="trigger">
                    <button
                        class="flex items-center bg-white rounded-lg p-2 w-auto text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <span><span class="font-semibold">{{ $ordersPerPage }}</span> ordenes por página</span>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    @foreach ($paginationValues as $value)
                        <button wire:click="setPagination({{ $value }})"
                            class="w-full {{ $ordersPerPage == $value ? 'bg-green-100' : 'bg-white hover:bg-gray-50' }} text-sm p-2">{{ $value }}</button>
                    @endforeach
                </x-slot>
            </x-dropdown>
            <x-dropdown align="top" contentClasses="flex flex-col" width='48'>
                <x-slot name="trigger">
                    <button
                        class="flex items-center bg-white rounded-lg p-2 w-auto text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <span>{{ $this->getStatusLabel($status) }}</span>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    @foreach ($statusValues as $value)
                        <button wire:click="setStatus('{{ $value }}')"
                            class="w-full {{ $status == $value ? 'bg-green-100' : 'bg-white hover:bg-gray-50' }} text-left font-normal text-sm p-2">{{ $this->getStatusLabel($value) }}</button>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>
        <div class="relative w-1/2 px-4 max-w-full flex-grow flex-1 text-right">
            <input type="text" placeholder="Buscar..." wire:model="search" class="border-0 rounded-lg w-1/2 ">
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
                            <x-table.cell class="whitespace-normal">
                                <div x-data="{ expanded: false }" class="max-w-xs">
                                    <p x-show="!expanded" class="truncate">{{ $order->comments }}</p>
                                </div>
                            </x-table.cell>
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
                                    <a href="{{ route('orders.edit', $order ->id) }}"
                                        class="w-32 flex justify-self-end items-center text-center space-x-2 text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-base px-5 py-2.5 mr-2 mb-2"
                                        title="comentario">
                                        <x-heroicon-o-plus class="w-6 h-6" />
                                        <span>Comentario</span>
                                    </a>
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
