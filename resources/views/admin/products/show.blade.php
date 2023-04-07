@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <a href="{{ route('products.index') }}"><button class="btn btn-primary">products</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>show product</h1>
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
            </tr>
            <tr href="{{ route('products.show', ['product' => $product->id]) }}">
                <td>{{$product->id}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><image height="50px"  src="{{asset('/storage/'.$product->image)}}"></td>
            </tr>
    </table>
    </div>
