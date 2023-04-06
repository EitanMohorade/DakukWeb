@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <a href="{{url ('/addVercategories')}}"><button class="btn btn-primary">categories</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER productS</h1>
    </div>
    <a href="{{route('products.index')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
        <form>
        </form>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>description</td>
                <td>Acciones</td>
            </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
            </tr>
            @endforeach
    </table>
    </div>
