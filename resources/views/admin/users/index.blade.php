<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div>

        <section class="py-1 bg-blueGray-50">
            <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-8">
                @livewire('admin.users.index', key($user->id))
            </div>

        </section>
    </div>

</x-app-layout>
