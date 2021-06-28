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
            <li class="list-group-item"><h2>Reservas</h2></li>
            <li class="list-group-item"><a href= {{route('reservation.register', Auth::user()->id) }} ><button type="button" class="btn btn-success btn-lg btn-block">Nuevo reservacion</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Detalle</th>                
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                   <tr>
                        <td>{{$reservation->date}}</td>
                        <td>{{$reservation->time}}</td>
                        <td>{{$reservation->details}}</td>                           
                        <td>
                            {{-- 0 no agendada 1 agendada 2 dada de baja --}}
                            @if ($reservation->status == 0)  
                            <a href="{{route('reservation.delete', $reservation->id)}}"><button type="button" class="btn btn-danger" >Dar de baja</button></a>                   
                            @endif
                            {{-- <a href="{{route('reservation.edit',$reservation->id)}}"><button type="button" class="btn btn-info">Editar</button></a> --}}
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$reservations->links()}}</div>
    </div>
@endsection