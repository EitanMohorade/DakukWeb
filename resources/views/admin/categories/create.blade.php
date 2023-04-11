<x-app-layout>
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir categoria') }}
        </h2>
    </x-slot>
<form class="row g-3 needs-validation" action="{{route('categories.store')}}" method="POST"novalidate>
    @csrf

  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">name</label>
    <input type="text" class="form-control" name="name" required>

    <label for="validationCustom01" class="form-label">father category</label>
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

  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</x-app-layout>
