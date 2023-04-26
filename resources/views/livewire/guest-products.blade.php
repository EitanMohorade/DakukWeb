<div class="relative flex flex-col min-w-0 break-words w-full mb-6">
    <div class="w-full flex rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex space-x-4">
            <x-dropdown align="top" contentClasses="flex flex-col" width='20'>
                <x-slot name="trigger">
                    <button
                        class="flex items-center bg-white rounded-lg p-2 w-auto text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <span><span class="font-semibold">{{ $productsPerPage }}</span> productos por página</span>
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
                            class="w-full {{ $productsPerPage == $value ? 'bg-green-100' : 'bg-white hover:bg-gray-50' }}">{{ $value }}</button>
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
                <x-table.header :align="'left'" sortable wire:click="sortBy('id')" :direction="$sortField == 'id' ? $sortDirection : null" value="ID">ID
                </x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('name')" :direction="$sortField == 'name' ? $sortDirection : null" value="nombre">
                    Nombre</x-table.header>
                    <x-table.header :align="'left'" sortable wire:click="sortBy('category')" :direction="$sortField == 'category' ? $sortDirection : null" value="categoria">
                        Categoria</x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('description')" :direction="$sortField == 'description' ? $sortDirection : null"
                    value="descripcion">Descripcion</x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('stock')" :direction="$sortField == 'stock' ? $sortDirection : null"
                    value="stock">Stock</x-table.header>
                <x-table.header :align="'left'" sortable wire:click="sortBy('image')" :direction="$sortField == 'image' ? $sortDirection : null"
                    value="imagen">Imagen</x-table.header>
                <x-table.header :align="'left'">Estado</x-table.header>
            </x-slot>
            <x-slot name="body">
                @if (!$products->isEmpty())
                    @foreach ($products as $product)
                        <tr class="odd:bg-white even:bg-gray-100" wire:loading.class="opacity-75">
                            <x-table.cell>{{ $product->id }}</x-table.cell>
                            <x-table.cell>{{ $product->name }}</x-table.cell>
                            <x-table.cell>
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @endif
                            </x-table.cell>
                            <x-table.cell class="whitespace-normal">
                                <div x-data="{ expanded: false }" class="max-w-xs">
                                    <p x-show="!expanded" class="truncate">{{ $product->description }}</p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>{{ $product->stock }}</x-table.cell>
                            <x-table.cell><img width="100px" src="{{ asset('storage/' . $product->image) }}">
                            </x-table.cell>
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center bg-{{ $product->status_color }}-100 text-{{ $product->status_color }}-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 mr-1 bg-{{ $product->status_color }}-500 rounded-full"></span>
                                    {{ $product->deleted_at ? 'Inactivo' : 'Activo' }}
                                </span>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex justify-end">
                                    @auth
                                        <a href="{{ route('customer.products.show', $product->id) }}"\
                                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900"
                                        title="Ver">Ver</a>
                                        <a href="{{ route('customer.orders.store', $product->id) }}"\
                                            class="text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-green-900"
                                            title="Carrito">Carrito</a>
                                    @endauth
                                    @guest
                                        <a href="{{ route('guest.products.show', $product->id) }}"\
                                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900"
                                        title="Ver">Ver</a>
                                        <a href="{{ route('login') }}"\
                                            class="text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-green-900"
                                            title="Carrito">Carrito</a>
                                    @endguest
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
        {{ $products->links() }}
    </div>
</div>

