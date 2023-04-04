@extends("bootstrap")
<body>
            <!-- AGREGAR DATOS A LA BD -->
<form class="row g-3 needs-validation" action="{{route('agregarUsuario')}}" method="POST" novalidate> 
    @csrf

  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">APELLIDO</label>
    <input type="text" class="form-control" name="apellido" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">EMAIL</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="email" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">CONTRAñA</label>
    <input type="text" class="form-control" name="contraseña" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
  @if ($errors->any())
    <div>
      @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
      @endforeach
    </div>
  @endif

</body>