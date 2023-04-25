<x-app-layout>
    <x-auth-card>
        <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <x-slot name="logo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ver Producto') }}
            </h2>
        </x-slot>
                <div class="mt-4">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="mt-4">
                    <img src="{{ asset('images/') }}">
                </div>
            <div class="mt-4">       
                <p>{{ $product->description }}</p>
            </div>
            <div class="mt-4">
                <p>Precio: {{ $product->price }}</p>
            </div>
            <div class="mt-4">
                <p>Categoría: {{ $product->category->name }}</p>
            </div>
    </x-auth-card>
</x-app-layout>

