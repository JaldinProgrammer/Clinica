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
        {{-- I'm using isset in order to know if I got a variable "$user" inside this view --}}
        @if (isset($user) && $user->id == Auth::user()->id)
            <a href= {{route('user.locations.register') }} ><button type="button" class="btn btn-success btn-lg btn-block">Nueva direccion</button></a>        
        @endif
        @if (isset($user))
        <h1>{{"Ubidaciones de ".$user->name}}</h1>
        @else
        <h1>{{"Ubidaciones de ".Auth::user()->name}}</h1>
        @endif
        
        <table class="table table-striped">
            <thead>
                  <th>Titulo</th>
                  <th>detalles</th>
                  <th>Mapa</th>
                  <th>configuracion</th>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                   <tr>
                        <td>{{$location->title}}</td>
                        <td>{{$location->details}}</td> 
                        <td>
                            <a href={{ route('user.locations.showMap',$location->id)}}><button type="button" class="btn btn-warning">MAP</button></a>
                        </td>              
                        <td>
                            <a href="#"><button type="button" class="btn btn-warning">Editar</button></a>
                            <a href="#"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar esta especie?')">Borrar</button></a>                 
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>

</body>
</html>