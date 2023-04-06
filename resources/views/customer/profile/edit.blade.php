@extends("bootstrap")
<body>
            <!-- EDITAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>EDITAR user</h1>
            </div>
            <a href="{{url ('ViewUsers/')}}"><button class="btn btn-primary">VER</button></a>
<form class="row g-3 needs-validation" method="POST" action="{{url ('actualizaruser/'.$user->id)}}" enctype="multipart/form-data" novalidate>
    @csrf
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>

    <label for="validationCustom02" class="form-label">surname</label>
    <input type="text" class="form-control" name="surname" id="surname" value="{{$user->surname}}" required>

    <label for="validationCustom02" class="form-label">EMAIL</label>
    <input type="text" class="form-control" name="Email" id="Email" value="{{$user->Email}}" required>

    <label for="validationCustom02" class="form-label">password</label>
    <input type="text" class="form-control" name="password" id="password" value="{{$user->password}}" required>

  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</body>
