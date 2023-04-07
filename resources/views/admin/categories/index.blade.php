@extends("bootstrap")
<a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>categories for admins</h1>
    </div>
    <a href="{{route('categories.create')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
            <form action="{{ route('categories.search') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar productos" aria-label="Buscar" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
            <tr>
                <td>id</td>
                <td>category</td>
                <td>father category</td>
                <td>ACCIONES</td>
            </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->category_id}}</td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                    <a href="{{ route('categories.edit', $category->id  ) }}"><button class="btn btn-primary">edit</button>
                    <a href="{{ route('categories.show', $category->id  ) }}"><button class="btn btn-primary">show</button>
                </td>
            </tr>
        @endforeach
    </table>
