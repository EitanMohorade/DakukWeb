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
                <p>Cantidad: {{ $product->stock }}</p>
            </div>
            <div class="mt-4">
                <p>Categoría: {{ $product->category->name }}</p>
            </div>
            <div class="flex justify-end">
            <a href="{{ route('products.edit', $product->id) }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                title="Editar">Editar</a>
            </div>
    </x-auth-card>
</x-app-layout>

