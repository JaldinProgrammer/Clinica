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
        </ul>
        <br>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               Especialidades
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach ($specialities as $speciality)
            <li><a class="dropdown-item" href="{{route('user.setSpeciality',[$usuario->id, $speciality->id])}}">{{ $speciality->name}}</a></li>
            @endforeach
            </ul>
        </div>    
        <table class="table table-striped">
            <thead>
                  <th>Permiso </th>
                  <th>creado: </th>
                  <th>actualizado: </th>
                  <th>Opciones</th> 
            </thead>
            <tbody>
                @foreach ($User_Specialities as $User_Speciality)
                   <tr>
                        <td>{{$User_Speciality->speciality->name}}</td>   
                        <td>{{$User_Speciality->created_at}}</td>
                        <td>{{$User_Speciality->updated_at}}</td>          
                        <td>
                            @if ($User_Speciality->status==1)
                            <a href="{{route('user.desactivateSpeciality', $User_Speciality->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('user.activateSpeciality', $User_Speciality->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           
                        </td>                 
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{inserto()}}</div> --}}
    </div>
    <!-- JavaScript Bundle with Popper -->
@endsection