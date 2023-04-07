@extends("bootstrap")
<a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>categories</h1>
    </div>
    <div class="conteiner">
    <table class="table table-bordered">
            <form action="{{ route('categories.search') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar productos" aria-label="Buscar" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
            <tr>
                <td>category</td>
                <td>father category</td>
                <td>ACCION</td>
            </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->category_id}}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id  ) }}"><button class="btn btn-primary">show</button>
                </td>
            </tr>
        @endforeach
    </table>
