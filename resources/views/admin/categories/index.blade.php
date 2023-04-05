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
            </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <a href="{{url ('eliminarcategory/'.$category->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>
        @endforeach
        <tr>
                <td>id</td>
                <td>sub category</td>
                <td>category</td>
            </tr>
        @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{$subcategory->id}}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->category}}</td>
                <td>
                <a href="{{url ('eliminarSubcategory/'.$subcategory->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>
        @endforeach
        <tr>
                <td>id</td>
                <td>sub sub category</td>
                <td>sub category</td>
            </tr>
        @foreach ($subSubcategories as $subSubcategory)
            <tr>
                <td>{{$subSubcategory->id}}</td>
                <td>{{$subSubcategory->name}}</td>
                <td>{{$subSubcategory->Subcategory}}</td>
                <td>
                <a href="{{url ('eliminarSubSubcategory/'.$subSubcategory->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
    <form class="row g-3 needs-validation" action="{{route('addcategory')}}" method="POST" novalidate>
        @csrf
        <div class="col-md-2">
            <label for="validationCustom01" class="form-label">category</label>
            <input type="text" class="form-control" name="nameC" required>

            <label for="validationCustom01" class="form-label">SUB category</label>
            <select name="Subcategory">
                <option value="">--eligir--</option>
                @foreach ($categories as $category)
                    <option name="Subcategory" value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="nameSC" required>

            <label for="validationCustom01" class="form-label">SUB SUB category</label>
            <select name="SubSubcategory">
                <option value="">--eligir--</option>
                @foreach ($categories as $category)
                    <optgroup label="{{$category->name}}">
                        @foreach ($subcategories as $subcategory)
                            @if ($subcategory->category == $category->name)
                                <option name="SubSubcategory" value="{{$subcategory->name}}">{{$subcategory->name}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <input type="text" class="form-control" name="nameSSC" required>

        <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
