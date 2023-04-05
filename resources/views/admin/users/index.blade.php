@extends("bootstrap")
    <!-- VER DATOS DE BD -->
    <a href="{{url ('/')}}"><button class="btn btn-primary">HOME</button></a>
    <div class="big-padding" text-center blue-grey>
        <h1>VER users</h1>
    </div>
    <a href="{{url ('adduser/')}}"><button class="btn btn-primary">add</button></a>
    <div class="conteiner">
    <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>surname</td>
                <td>Email</td>
                <td>Contraseña</td>
                <td>Acciones</td>
            </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->Contraseña}}</td>
                <td>
                <a href="{{url ('EditUser/'.$user->id)}}" title="Editar"><button class="btn btn-primary">editar</button></a>
                <a href="{{url ('eliminaruser/'.$user->id)}}" title="Eliminar"><button class="btn btn-primary">eliminar</button>
                </td>
            </tr>
            @endforeach
    </table>
    </div>
