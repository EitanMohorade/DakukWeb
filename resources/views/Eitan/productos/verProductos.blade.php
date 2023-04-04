@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <a href="{{url ('/agregarVerCategorias')}}"><button class="btn btn-primary">CATEGORIAS</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER PRODUCTOS</h1>
    </div>
    <a href="{{url ('agregarProductos/')}}"><button class="btn btn-primary">AGREGAR</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
        <form>
            <label for="validationCustom01" class="form-label">CATEGORIA</label>
                    <select name="Categoria">
                        <option value="">--Todo--</option>
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
            <button type="submit">BUSCAR</button>        
        </form>
            <tr>
                <td>id</td>
                <td>categoria</td>
                <td>subcategoria</td>
                <td>subsubcategoria</td>
                <td>imagen</td>
                <td>descripcion</td>
                <td>Acciones</td>
            </tr>
            
        @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->Categoria}}</td>
                <td>{{$producto->SubCategoria}}</td>
                <td>{{$producto->SubSubCategoria}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td><image height="50px"  src="{{asset('/storage/images/productos/'.$producto->Imagen)}}"></td>
                <td>
                <a href="{{url ('editarProducto/'.$producto->id)}}" title="Editar"><button class="btn btn-primary">editar</button></a>
                <a href="{{url ('eliminarProducto/'.$producto->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>  
            @endforeach
    </table>
    </div>
