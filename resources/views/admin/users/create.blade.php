@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <a href="{{url ('/addVercategories')}}"><button class="btn btn-primary">categories</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER productS</h1>
    </div>
    <a href="{{url ('addproducts/')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
        <form>
            <label for="validationCustom01" class="form-label">category</label>
                    <select name="category">
                        <option value="">--Todo--</option>
                            @foreach ($categories as $category)
                                <option name="category" value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                <label for="validationCustom01" class="form-label">SUB category</label>
                    <select name="Subcategory">
                        <option value="">--eligir--</option>
                        @foreach ($categories as $category)
                            <optgroup label="{{$category->name}}">
                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category == $category->name)
                                        <option name="Subcategory" value="{{$subcategory->name}}">{{$subcategory->name}}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                </select>
            <button type="submit">BUSCAR</button>
        </form>
            <tr>
                <td>id</td>
                <td>category</td>
                <td>subcategory</td>
                <td>subsubcategory</td>
                <td>image</td>
                <td>description</td>
                <td>Acciones</td>
            </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->Subcategory}}</td>
                <td>{{$product->SubSubcategory}}</td>
                <td>{{$product->description}}</td>
                <td><image height="50px"  src="{{asset('/storage/images/products/'.$product->image)}}"></td>
                <td>
                <a href="{{url ('editarproduct/'.$product->id)}}" title="Editar"><button class="btn btn-primary">editar</button></a>
                <a href="{{url ('eliminarproduct/'.$product->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>
            @endforeach
    </table>
    </div>
