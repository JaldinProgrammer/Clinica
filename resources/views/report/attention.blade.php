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
        <h1>Insumos</h1>
        <table class="table table-striped">
            <thead>
                  <th>Check-In</th>
                  <th>Check-Out</th>
                  <th>Precio Total</th>
                  <th>Paciente</th>
                  <th>Enfermera</th> 
                  <th></th>
            </thead>
            <tbody>
                @foreach ($attentions as $attention)
                   <tr>
                        <td>{{$attention->checkIn}}</td>   
                        <td>{{$attention->checkOut}}</td>   
                        <td>{{$attention->totalPrice}}</td>
                        <td>{{$attention->patient->name}}</td>  
                        <td>{{$attention->nurse->name}}</td>  
                        <td><a href="#"><button type="button" class="btn btn-info">Editar</button></a> </td>        
                        <td>
                            {{-- @if ($instrument->status==1)
                            <a href="{{route('instruments.desactivateOne', $instrument->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('instruments.activateOne', $instrument->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           --}}
                        </td>             
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$attentions->links()}}</div>
    </div>
    
</body>
</html>