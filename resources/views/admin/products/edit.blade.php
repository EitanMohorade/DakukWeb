@extends("bootstrap")
<body>
            <!-- EDITAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>EDITAR productS</h1>
            </div>
            <a href="{{url ('ViewProducts/')}}"><button class="btn btn-primary">VER</button></a>
<form class="row g-3 needs-validation" method="POST" action="{{url ('actualizarproduct/'.$product->id)}}" enctype="multipart/form-data" novalidate>
    @csrf
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" required>

    <label for="validationCustom01" class="form-label">category</label>
            <select name="category">
                <option value="">--eligir--</option>
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
    <label for="validationCustom01" class="form-label">SUB SUB category</label>
            <select name="SubSubcategory">
                <option value="">--eligir--</option>
                @foreach ($subcategories as $subcategory)
                    <optgroup label="MATERIAL: {{$subcategory->category}}">
                        @foreach ($subSubcategories as $subSubcategory)
                            @if ($subcategory->name == $subSubcategory->Subcategory)
                                <option name="SubSubcategory" value="{{$subSubcategory->name}}">{{$subSubcategory->name}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
    <label for="validationCustom02" class="form-label">image</label>
    <input type="file" name="image" value="{{$product->image}}" class="form-control-file">

    <label for="validationCustom02" class="form-label">description</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$product->description}}" required>

  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</body>
