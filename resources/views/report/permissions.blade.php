@extends('layouts.nav')
@section('content')

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
        <ul class="list-group list-group-flush">
                <li class="list-group-item"><h2>permisos</h2></li>
            @foreach ($roles as $role)
                @if ($role->id == 1)
                <li class="list-group-item"><a href= "{{route('user.makePatient', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">
                    <img src="{{asset('./Icons/patient.png')}}" alt="pata" width="25" height="25">
                    hacer paciente</button></a></li>
                @endif
                @if ($role->id == 2)
                <li class="list-group-item"><a href= "{{route('user.makeAdmin', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">
                    <img src="{{asset('./Icons/admin.png')}}" alt="pata" width="25" height="25">
                    hacer administrador</button></a></li>
                @endif
                @if ($role->id == 3)
                <li class="list-group-item"><a href= "{{route('user.makeNurse', $usuario->id)}}" ><button type="button" class="btn btn-success btn-lg btn-block">
                    <img src="{{asset('./Icons/doctor.png')}}" alt="pata" width="25" height="25">
                    hacer personal medico</button></a></li>
                @endif
            @endforeach
        </ul>  
        <br>      
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
    </div>
@endsection