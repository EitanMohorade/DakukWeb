<x-app-layout>
    <x-authentication-card>
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <x-slot name="logo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Apartado de edicion') }}
            </h2>
        </x-slot>
                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <x-label for="name" :value="__('Name')"/>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="block mt-1 w-full">
                    </div>

                    {{-- <div>
                        <x-label for="image" :value="__('Image')"/>
                        <input type="file" name="image" class="form-control-file" value="{{ $product->image }}">
                    </div> --}}

                    <div>
                        <x-label for="description" :value="__('Description')"/>
                        <input type="text" class="block mt-1 w-full" name="description" value="{{ $product->description }}" >
                    </div>

                    <div>
                        <x-label for="price" :value="__('Price')"/>
                        <input type="text" class="block mt-1 w-full" name="price" value="{{ $product->price }}">
                    </div>

                    <div>
                        <x-label for="stock" :value="__('Stock')"/>
                        <input type="text" class="block mt-1 w-full" name="stock" value="{{ $product->stock }}">
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save Changes') }}
                        </x-button>
                    </div>            
                </form>
    </x-authentication-card>
</x-app-layout>
