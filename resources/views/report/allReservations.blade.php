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
     {{-- BUSCADOR --}}     
    <br>
    <div class="container">
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>Reservaciones</h2></li>      
        </ul>
        <br>
        <ul class="list-group">
            <li class="list-group-item">
            <form method="GET" class="form-inline" action="{{route('reservation.dateSearched')}}">
                    <input type="date" class="form-control mr-sm-2" name="searched" placeholder="fecha de reservacion">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search-plus fa-lg"></i></button>
            </form>
            </li>
            <li class="list-group-item"><a href="{{route('reservation.pastReservations')}}"><button type="button" class="btn btn-danger" >reservaciones pasadas</button></a> </li>
            <li class="list-group-item"><a href="{{route('reservation.nowReservations')}}"><button type="button" class="btn btn-danger" >reservaciones de hoy</button></a> </li>
            <li class="list-group-item"><a href="{{route('reservation.futureReservations')}}"><button type="button" class="btn btn-danger" >reservaciones futuras</button></a> </li>
        </ul>
    </div>
    {{-- reservation.nowReservations --}}
    <div class="container">
        
        
        <table class="table table-striped">
            <thead>
                  <th>Fecha </th>
                  <th>Hora</th>
                  <th>Paciente</th>
                  <th>Detalles</th> 
                  <th>Servicio</th>
                  <th>Estado</th>           
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                   <tr>
                        <td>{{$reservation->date->toFormattedDateString()}}</td>         
                        <td>{{$reservation->time->toTimeString()}}</td>         
                        <td>{{$reservation->user->name}}</td>  
                        <td>{{$reservation->details}}</td>  
                        <td>{{$reservation->service->name}}</td>       
                        <td>
                            @if ($reservation->status == 0)
                                {{"No agendado"}}
                            @else
                                @if ($reservation->status == 1)
                                {{"Agendado"}}
                                @else    
                                {{"Dado de baja"}}
                                @endif
                            @endif
                        </td>
                                 
                        @can('nurse')
                            <td>
                                @if ($reservation->status == 0)
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                        <h4 class="accordion-header" id="headingOne">
                                            <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{"Agendar"}}
                                            </button>
                                        </h4>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <form action={{route('schedule.create')}} method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                    {{-- <label for="name" class="form-label">Nuevo tipo de instrumento</label> --}}
                                                    <input type="text" name="zoomLink" placeholder="Link de zoom (opcional)" class="form-control" id="zoomLink" aria-describedby="zoomLink">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                                                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                                                    {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Agendar ahora</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        @endcan
                        
                        <td>
                            @if ($reservation->status != 2)
                            <a href="{{route('user.locations.showMap', $reservation->location->id)}}"><button type="button" class="btn btn-warning">Ubicacion</button></a>                                          
                            @endif
                        </td>               
                        
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$reservations->links()}}</div>
    </div>
@endsection