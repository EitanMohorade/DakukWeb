<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
            <a href="{{route ('categories.index')}}"><button class="btn btn-primary">VER</button></a>
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
</x-app-layout>
