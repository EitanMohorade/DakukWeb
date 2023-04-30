<x-app-layout>
    <x-authentication-card>
            <link rel="stylesheet"
                href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
            <x-slot name="logo">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Añadir Producto') }}
                </h2>
            </x-slot>

        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" :value="__('Nombre')" />
                <x-input type="text" class="block mt-1 w-full" name="name" required/>
            </div>

            <div>
                <x-label for="image" :value="__('Imagen')" />
                <x-input type="file" name="image" class="form-control-file"/>
            </div>

            <div>
                <x-label for="description" :value="__('Descripcion')" />
                <x-input type="text" class="block mt-1 w-full" name="description" required/>
            </div>
            {{--<div>
              <label for="category_id" :value="__('Categorias')" />
                    <select name="category_id">
                        <option value="">--eligir--</option>
                        @foreach ($categories as $category)
                            @if ($category->category_id == null)
                                <option style="font-weight: bold;" name="category_id" value="{{$category->id}}">{{$category->name}}
                            @else
                                <option  name="category_id" value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>--}}
            <div>
                <x-label for="price" :value="__('Precio')" />
                <x-input type="text" class="block mt-1 w-full" name="price" required/>
            </div>
            
            <div>
                <x-label for="stock" :value="__('Cantidad')" />
                <x-input type="text" class="block mt-1 w-full" name="stock" required/>
            </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{__('Submit')}}
            </x-button>
        </div>
        </form>
    </x-authentication-card>
</x-app-layout>
