<x-app-layout>
    <x-auth-card>
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <x-slot name="logo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Añadir categoria') }}
            </h2>
        </x-slot>
        <form action="{{route('categories.store')}}" method="POST"novalidate>
            @csrf
        <div>
            <x-label for="name" :value="__('Name')"/>
            <x-input type="text" class="block mt-1 w-full" name="name" required/>
        </div>

            <div class="mt-4">
                <x-label for="category_id" :value="__('Category Father')"/>
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
            </div>
            
            <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Submit') }}
                    </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
