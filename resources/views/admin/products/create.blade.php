@extends("bootstrap")
<body>
            <!-- add DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>add product</h1>
            </div>
            <a href="{{route ('products.index')}}"><button class="btn btn-primary">VER</button></a>
<form class="row g-3 needs-validation" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf

  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">name</label>
    <input type="text" class="form-control" name="name" required>

    <label for="validationCustom02" class="form-label">image</label>
    <input type="file" name="image" class="form-control-file">

    <label for="validationCustom02" class="form-label">description</label>
    <input type="text" class="form-control" name="description" required>

    <label for="validationCustom02" class="form-label">price</label>
    <input type="text" class="form-control" name="price" required>

    <label for="validationCustom02" class="form-label">stock</label>
    <input type="text" class="form-control" name="stock" required>

  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</body>
