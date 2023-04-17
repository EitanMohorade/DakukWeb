<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Usuario') }}
        </h2>
    </x-slot>
            <div>
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->surname }}</p>
            </div>
</x-app-layout>
