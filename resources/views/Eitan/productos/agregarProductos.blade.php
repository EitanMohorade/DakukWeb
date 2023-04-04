@extends("bootstrap")
<body>
            <!-- AGREGAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>AGREGAR PRODUCTO</h1>
            </div>
            <a href="{{url ('verProductos/')}}"><button class="btn btn-primary">VER</button></a>
<form class="row g-3 needs-validation" action="{{route('agregarProducto')}}" method="POST" enctype="multipart/form-data" novalidate> 
    @csrf

  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">NOMBRE</label>
    <input type="text" class="form-control" name="Nombre" required>

    <label for="validationCustom01" class="form-label">CATEGORIA</label>
            <select name="Categoria">
                <option value="">--eligir--</option>
                @foreach ($categorias as $categoria)
                    <option name="Categoria" value="{{$categoria->Nombre}}">{{$categoria->Nombre}}</option>
                @endforeach
            </select>

    <label for="validationCustom01" class="form-label">SUB CATEGORIA</label>
            <select name="SubCategoria">
                <option value="">--eligir--</option>
                @foreach ($categorias as $categoria)
                    <optgroup label="{{$categoria->Nombre}}">
                        @foreach ($subCategorias as $subCategoria)
                            @if ($subCategoria->Categoria == $categoria->Nombre)
                                <option name="SubCategoria" value="{{$subCategoria->Nombre}}">{{$subCategoria->Nombre}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
    <label for="validationCustom01" class="form-label">SUB SUB CATEGORIA</label>
            <select name="SubSubCategoria">
                <option value="">--eligir--</option>
                @foreach ($subCategorias as $subCategoria)
                    <optgroup label="MATERIAL: {{$subCategoria->Categoria}}">
                        @foreach ($subSubCategorias as $subSubCategoria)
                            @if ($subCategoria->Nombre == $subSubCategoria->SubCategoria)
                                <option name="SubSubCategoria" value="{{$subSubCategoria->Nombre}}">{{$subSubCategoria->Nombre}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

    <label for="validationCustom02" class="form-label">iMAGEN</label>
    <input type="file" name="Imagen" class="form-control-file">
  
    <label for="validationCustom02" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="Descripcion" required>
  
  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
 
</body>