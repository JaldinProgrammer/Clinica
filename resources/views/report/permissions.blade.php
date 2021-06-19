<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab</title>
</head>
<body>
    @include('layouts.nav')

    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <br>

    <div class="container">
        <br>
        {{-- @php
            dd($usuario);
        @endphp --}}
        @foreach ($roles as $role)
            @if ($role->id == 1)
            <a href= "{{route('user.makePatient', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">hacer paciente</button></a>
            @endif
            @if ($role->id == 2)
            <a href= "{{route('user.makeAdmin', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">hacer administrador</button></a>
            @endif
            @if ($role->id == 3)
            <a href= "{{route('user.makeNurse', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">hacer personal medico</button></a>
            @endif
        @endforeach
        <h1>permisos</h1>

        <table class="table table-striped">
            <thead>
                  <th>Permiso </th>
                  <th>creado: </th>
                  <th>actualizado: </th>
                  <th>Opciones</th> 
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                   <tr>
                        <td>{{$permission->role->name}}</td>   
                        <td>{{$permission->role->created_at}}</td>
                        <td>{{$permission->role->updated_at}}</td>          
                        <td>
                            @if ($permission->status==1)
                            <a href="{{route('user.desactivatePermission',$permission->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('user.activatePermission',$permission->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           
                        </td>                 
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>

</body>
</html>