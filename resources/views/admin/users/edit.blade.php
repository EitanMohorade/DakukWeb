<x-app-layout>
  <x-auth-card>
      <link rel="stylesheet"
          href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
      <x-slot name="logo">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Apartado de edicion') }}
          </h2>
      </x-slot>
              <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mt-4">
                      <x-label for="name" :value="__('Name')"/>
                      <input type="text" name="name" id="name" value="{{ $user->name }}" class="block mt-1 w-full">
                  </div>
                  
                  <div class="mt-4">
                    <x-label for="email" :value="__('Email')"/>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="block mt-1 w-full">
                  </div>

                  <div class="flex items-center justify-end mt-4">
                      <x-button class="ml-4">
                          {{ __('Save Changes') }}
                      </x-button>
                  </div>            
              </form>
  </x-auth-card>
</x-app-layout>
