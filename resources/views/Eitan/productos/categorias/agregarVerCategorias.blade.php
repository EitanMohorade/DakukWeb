@extends("bootstrap")
<a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>AGREGAR Y VER CATEGORIAS</h1>
    </div>

    <div class="conteiner">
    <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>categoria</td>
            </tr>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->Nombre}}</td>
                <td>
                <a href="{{url ('eliminarCategoria/'.$categoria->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>  
        @endforeach
        <tr>
                <td>id</td>
                <td>sub categoria</td>
                <td>categoria</td>
            </tr>
        @foreach ($subCategorias as $subCategoria)
            <tr>
                <td>{{$subCategoria->id}}</td>
                <td>{{$subCategoria->Nombre}}</td>
                <td>{{$subCategoria->Categoria}}</td>
                <td>
                <a href="{{url ('eliminarSubCategoria/'.$subCategoria->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>  
        @endforeach
        <tr>
                <td>id</td>
                <td>sub sub categoria</td>
                <td>sub categoria</td>
            </tr>
        @foreach ($subSubCategorias as $subSubCategoria)
            <tr>
                <td>{{$subSubCategoria->id}}</td>
                <td>{{$subSubCategoria->Nombre}}</td>
                <td>{{$subSubCategoria->SubCategoria}}</td>
                <td>
                <a href="{{url ('eliminarSubSubCategoria/'.$subSubCategoria->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>  
        @endforeach
    </table>
    </div>
    <form class="row g-3 needs-validation" action="{{route('agregarCategoria')}}" method="POST" novalidate> 
        @csrf
        <div class="col-md-2">
            <label for="validationCustom01" class="form-label">CATEGORIA</label>
            <input type="text" class="form-control" name="NombreC" required>

            <label for="validationCustom01" class="form-label">SUB CATEGORIA</label>
            <select name="SubCategoria">
                <option value="">--eligir--</option>
                @foreach ($categorias as $categoria)
                    <option name="SubCategoria" value="{{$categoria->Nombre}}">{{$categoria->Nombre}}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="NombreSC" required>

            <label for="validationCustom01" class="form-label">SUB SUB CATEGORIA</label>
            <select name="SubSubCategoria">
                <option value="">--eligir--</option>
                @foreach ($categorias as $categoria)
                    <optgroup label="{{$categoria->Nombre}}">
                        @foreach ($subCategorias as $subCategoria)
                            @if ($subCategoria->Categoria == $categoria->Nombre)
                                <option name="SubSubCategoria" value="{{$subCategoria->Nombre}}">{{$subCategoria->Nombre}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <input type="text" class="form-control" name="NombreSSC" required>
        
        <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>