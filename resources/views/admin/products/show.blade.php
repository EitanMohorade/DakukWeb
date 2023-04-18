<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Producto') }}
        </h2>
    </x-slot>
            <div>
                <h1>{{ $product->name }}</h1>
                <img src="{{ asset('images/' . $product->image) }}">
                <p>{{ $product->description }}</p>
                <p>Precio: {{ $product->price }}</p>
                <p>Categoría: {{ $product->category->name }}</p>
            </div>
</x-app-layout>

