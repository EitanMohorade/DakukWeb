<x-app-layout>
<x-auth-card>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="logo">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Usuario') }}
        </h2>
    </x-slot>
            <div class="mt-4">
                <h1>Nombre: {{ $user->name }}</h1>
            </div>
            <div class="mt-4">
                <h1>Email: {{ $user->email }}</h1>
            </div>
        </x-auth-card>
</x-app-layout>
