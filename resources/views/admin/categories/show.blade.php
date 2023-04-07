@extends("bootstrap")
<body>
            <!-- FUNCTION SHOW -->
            <div class="big-padding" text-center blue-grey>
              <h1>show category</h1>
            </div>
            <a href="{{route ('categories.index')}}"><button class="btn btn-primary">VER</button></a>
        <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>category_id</td>
            </tr>
            <tr href="{{ route('categories.show', ['category' => $category->id]) }}">
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->category_id}}</td>
            </tr>
        </table>
</body>
