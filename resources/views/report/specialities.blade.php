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
        
        <h1>permisos</h1>
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
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>