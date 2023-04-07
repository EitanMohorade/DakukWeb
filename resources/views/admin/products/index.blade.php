@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <a href="{{url ('/addVercategories')}}"><button class="btn btn-primary">categories</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER productS</h1>
    </div>
    <a href="{{route('products.create')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
        <form>
        </form>
            <tr>
                <td>id</td>
                <td>category_id</td>
                <td>name</td>
                <td>description</td>
                <td>price</td>
                <td>stock</td>
                <td>image</td>
                <td>Acciones</td>
            </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><image height="50px"  src="{{asset('/storage/'.$product->image)}}"></td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                        <a href="{{url ('eliminarproduct/'.$product->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                    </td>
            </tr>
            @endforeach
    </table>
    </div>
