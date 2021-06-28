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
            <li class="list-group-item"><h2>Atenciones</h1></li>
        </ul>
        
        <table class="table table-striped">
            <thead>
                  <th>Check-In</th>
                  <th>Check-Out</th>
                  <th>Precio Total</th>
                  <th>Paciente</th>
                  <th>Encargado</th> 
                  <th></th>
            </thead>
            <tbody>
                @foreach ($attentions as $attention)
                   <tr>
                        <td>{{$attention->checkIn->toTimeString()}}</td>   
                        <td>{{$attention->checkOut->toTimeString()}}</td>   
                        <td>{{$attention->totalPrice}}</td>
                        <td>{{$attention->patient->name}}</td>  
                        <td>{{$attention->nurse->name}}</td>  
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$attentions->links()}}</div>
    </div>
@endsection