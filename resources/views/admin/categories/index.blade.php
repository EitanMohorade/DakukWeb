@extends("bootstrap")
<a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>categories</h1>
    </div>
    <a href="{{route('categories.create')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
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
                </td>
            </tr>
        @endforeach
    </table>
