@extends("bootstrap")
<body>
            <!-- EDITAR DATOS A LA BD -->
            <div class="big-padding" text-center blue-grey>
              <h1>EDITAR USUARIO</h1>
            </div>
            <a href="{{url ('verUsuarios/')}}"><button class="btn btn-primary">VER</button></a>            
<form class="row g-3 needs-validation" method="POST" action="{{url ('actualizarUsuario/'.$usuario->id)}}" enctype="multipart/form-data" novalidate> 
    @csrf
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label">NOMBRE</label>
    <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{$usuario->Nombre}}" required>

    <label for="validationCustom02" class="form-label">APELLIDO</label>
    <input type="text" class="form-control" name="Apellido" id="Apellido" value="{{$usuario->Apellido}}" required>

    <label for="validationCustom02" class="form-label">EMAIL</label>
    <input type="text" class="form-control" name="Email" id="Email" value="{{$usuario->Email}}" required>

    <label for="validationCustom02" class="form-label">CONTRASEñA</label>
    <input type="text" class="form-control" name="Contraseña" id="contraseña" value="{{$usuario->Contraseña}}" required>
  
  <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
 
</body>