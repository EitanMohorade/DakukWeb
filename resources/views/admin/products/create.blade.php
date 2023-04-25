<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Producto') }}
        </h2>
    </x-slot>

<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

  <div>
  <x-label for="name" :value="__('Nombre')" />
    <input type="text" class="form-control" name="name" required>
  </div>
  <div>
  <x-label for="image" :value="__('Imagen')" />
    <input type="file" name="image" class="form-control-file">
    </div>
    <div>
    <x-label for="description" :value="__('Descripcion')" />
    <input type="text" class="form-control" name="description" required>
    </div>
    <div>
    {{--  <x-label for="category_id" :value="__('Categorias')" />
            <select name="category_id">
                <option value="">--eligir--</option>
                @foreach ($categories as $category)
                    @if ($category->category_id == null)
                        <option style="font-weight: bold;" name="category_id" value="{{$category->id}}">{{$category->name}}
                    @else
                        <option  name="category_id" value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>--}}
            </div>
<div>
            <x-label for="price" :value="__('Precio')" />
    <input type="text" class="form-control" name="price" required>
    </div>
    <div>
    <x-label for="stock" :value="__('Cantidad')" />
    <input type="text" class="form-control" name="stock" required>
    </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</x-app-layout>
