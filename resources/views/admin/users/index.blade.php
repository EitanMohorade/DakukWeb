@extends('bootstrap')
<!-- VER DATOS DE BD -->
<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div>
    
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
                        <x-table.table :headers="['ID', 'Nombre', 'Apellido', 'Email', 'Estado']">
                            @if (!$users->isEmpty())
                                @foreach ($users as $user)
                                    <tr class="odd:bg-white even:bg-gray-100">
                                        <x-table.cell>{{ $user->id }}</x-table.cell>
                                        <x-table.cell>{{ $user->name }}</x-table.cell>
                                        <x-table.cell>{{ $user->surname }}</x-table.cell>
                                        <x-table.cell>{{ $user->email }}</x-table.cell>
                                        <x-table.cell>
                                            <span class="inline-flex items-center bg-{{ $user->status_color }}-100 text-{{ $user->status_color }}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                            <span class="w-2 h-2 mr-1 bg-{{ $user->status_color }}-500 rounded-full"></span>
                                            {{ $user->deleted_at ? 'Inactivo' : 'Activo' }}
                                            </span>
                                        </x-table.cell>
                                            <x-table.cell>
                                                <div class="flex justify-end">
                                                    @if ($user->deleted_at)
                                                    <a href="{{ route('users.restore', $user->id) }}" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900" title="Restaurar">Restaurar</a>
                                                    @else
                                                    <a href="{{ route('users.edit', $user->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" title="Editar">Editar</a>
                                                    <a href="{{ route('users.destroy', $user->id) }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" title="Eliminar">Eliminar</a>
                                                    @endif
                                                </div>
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

</x-app-layout>
