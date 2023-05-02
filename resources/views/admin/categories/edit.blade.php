<x-app-layout>
    <x-authentication-card>
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <x-slot name="logo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorias') }}
            </h2>
        </x-slot>
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <x-label for="name" :value="__('Name')"/>
                        <x-input type="text" name="name" id="name" value="{{ $category->name }}" class="block mt-1 w-full" required/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save Changes') }}
                        </x-button>
                    </div>
                </form>
        </x-authentication-card>
</x-app-layout>
