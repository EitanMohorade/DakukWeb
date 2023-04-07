@extends("bootstrap")
<body>
            <!-- EDITAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>edit productos</h1>
            </div>
            <a href="{{route ('products.index')}}"><button class="btn btn-primary">VER</button></a>
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">

                    <label for="validationCustom02" class="form-label">image</label>
                    <input type="file" name="image" class="form-control-file" value="{{ $product->image }}">

                    <label for="validationCustom02" class="form-label">description</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->description }}" >

                    <label for="validationCustom02" class="form-label">price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">

                    <label for="validationCustom02" class="form-label">stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>

</body>
