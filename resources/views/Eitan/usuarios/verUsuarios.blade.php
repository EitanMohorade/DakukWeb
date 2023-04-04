@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER USUARIOS</h1>
    </div>
    <a href="{{url ('agregarUsuario/')}}"><button class="btn btn-primary">AGREGAR</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Email</td>
                <td>Contraseña</td>
                <td>Acciones</td>
            </tr>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->Nombre}}</td>
                <td>{{$usuario->Apellido}}</td>
                <td>{{$usuario->Email}}</td>
                <td>{{$usuario->Contraseña}}</td>
                <td>
                <a href="{{url ('editarUsuario/'.$usuario->id)}}" title="Editar"><button class="btn btn-primary">editar</button></a>
                <a href="{{url ('eliminarUsuario/'.$usuario->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>  
            @endforeach
    </table>
    </div>
