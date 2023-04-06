@extends("bootstrap")
<a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>add Y VER categories</h1>
    </div>

    <div class="conteiner">
    <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>category</td>
                <td>father category</td>
            </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->category_id}}</td>
            </tr>
        @endforeach
    </table>
