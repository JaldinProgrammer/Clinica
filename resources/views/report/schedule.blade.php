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
            <li class="list-group-item"><h2>{{"Calendario de ". $user->name}}</h2></li>
        </ul>
        <br>

        <table class="table table-striped">
            <thead>
                  <th>Estado</th>
                  <th>Paciente</th>
                  <th>Servicio</th>
                  <th>Hora</th>
                  <th>Fecha</th>
                  <th>Link de zoom</th>
                  <th></th>
                  <th>Opciones</th>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                   <tr>
                        <td>
                            @if ($schedule->status == 1)
                                {{"Activo"}}
                            @else
                                @if ($schedule->status == 0)
                                {{"Desactivado"}}
                                @else
                                {{"Con atencion creada"}}
                                @endif
                            @endif
                        </td>
                        <td>{{$schedule->reservation->user->name}}</td>
                        <td>{{$schedule->reservation->service->name}}</td>
                        <td>{{$schedule->reservation->time->toTimeString()}}</td>
                        <td>{{$schedule->reservation->date->toFormattedDateString()}}</td>
                        <td><a href="{{$schedule->zoomLink}}" target="_new">{{$schedule->zoomLink}}</a></td>  
                        <td>
                            @if ($schedule->status == 1)                        
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                    <h4 class="accordion-header" id="headingOne">
                                        <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{"Nueva atencion"}}
                                        </button>
                                    </h4>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action={{ route('attention.create') }} method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="checkIn" class="col-md-4 col-form-label text-md-right">{{ __('Entrada') }}</label>
                                
                                                    <div class="col-md-6">
                                                        <input id="checkIn" type="time" class="form-control @error('checkIn') is-invalid @enderror" name="checkIn" value="{{ old('checkIn') }}" >                   
                                                        @error('checkIn')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <input type="hidden" name="schedule_id" value="{{$schedule->id}}">
                                                <input type="hidden" name="service_id" value="{{$schedule->reservation->service->id}}">
                                                <input type="hidden" name="nurse_id" value="{{$schedule->user_id}}">
                                                <input type="hidden" name="patient_id" value="{{$schedule->reservation->user->id}}">
                                                <button type="submit" class="btn btn-info">registrar</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>      
                            @endif
                        </td>
                        <td>
                            {{-- 0 no agendada 1 agendada 2 dada de baja --}}
                            @if ($schedule->status == 2)  
                            {{-- {{ route('attention.attention', $schedule->schedule_id)}} --}}
                            @foreach ($attentions as $attention)
                                @if ($schedule->id == $attention->schedule_id )
                                <a href="{{ route('attention.attention', $attention->id)}}"><button type="button" class="btn btn-success" >Ver atencion</button></a>
                                @endif
                            @endforeach
                              
                            @else
                            <a href="{{route('schedule.down',$schedule->id)}}"><button type="button" class="btn btn-danger" >Dar de baja</button></a>                 
                            @endif
                            {{-- <a href="{{route('reservation.edit',$reservation->id)}}"><button type="button" class="btn btn-info">Editar</button></a> --}}
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$schedules->links()}}</div>
    </div>
@endsection