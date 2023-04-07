@extends("bootstrap")
<body>
            <!-- EDITAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>edit categories</h1>
            </div>
            <a href="{{route ('categories.index')}}"><button class="btn btn-primary">VER</button></a>
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>

</body>
