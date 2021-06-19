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
    <div class="card-body">
                        
        <ul class="list-group list-group-flush "> 
            <li class="list-group-item" style="text-align: center">{{"Nombre: ".Auth::user()->name}}</li>
            <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->user}}</li>
            <li class="list-group-item" style="text-align: center">{{"Telefono: ".Auth::user()->phone}}</li>
            <li class="list-group-item" style="text-align: center">{{"Email: ".Auth::user()->email}}</li>
            <li class="list-group-item" style="text-align: center"><a href= {{route('user.perfil.locations',Auth::user()->id ) }} ><button type="button" class="btn btn-success btn-lg btn-block">Mis direcciones</button></a></li>
        </ul>
        
    </div>

    {{-- @include('layouts.nav')
        <h1>Dashboard</h1>
        @can('admin')
            <h1>Hola soy el admin</h1>
        @endcan 
        @can('nurse')
            <h1>Hola soy la enfermera</h1>
        @endcan 
        @can('patient')
            <h1>Hola soy el paciente</h1>
        @endcan  --}}
</body>
</html>