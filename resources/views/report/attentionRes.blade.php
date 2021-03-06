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
    {{-- {{dd($attention)}} --}}
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Atencion
            </div>
            <div class="card-body">
              <h5 class="card-title">Datos</h5>
              <p class="card-text">
                @foreach ($attentions as $attention)
                <ul class="list-group">
                    <li class="list-group-item">{{($attention->checkIn != null) ? "Hora de llegada: ". $attention->checkIn->toTimeString(): "-"}}</li>
                    <li class="list-group-item">{{($attention->checkOut != null)? "Hora de finalizacion: ". $attention->checkOut->toTimeString(): "-"}}</li>
                    <li class="list-group-item">{{"Fecha: ". $attention->date->toFormattedDateString()}}</li>
                    <li class="list-group-item">{{"Precio total: ". $attention->totalPrice . " bs."}}</li>
                    <li class="list-group-item">{{"Personal medico: ". $attention->nurse->name}}</li>
                    <li class="list-group-item">{{"Paciente: ". $attention->patient->name}}</li>
                    @if ($attention->checkIn != null && $attention->checkOut!=null)
                    
                    <li class="list-group-item"><b>{{"Duracion de la atencion: ". $attention->checkIn->diffInMinutes($attention->checkOut, true). " min."}}</b></li>
                    @endif
                </ul>
              </p>
              <br>
              <li class="list-group-item">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                    <h4 class="accordion-header" id="headingOne">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{"Configurar"}}
                        </button>
                    </h4>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action={{ route('attention.update', $attention->id) }} method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="checkIn" class="col-md-4 col-form-label text-md-right">{{ __('Check-In') }}</label>
                                    <div class="col-md-6">
                                        <input id="checkIn" type="time" class="form-control @error('checkIn') is-invalid @enderror" name="checkIn" value="{{ old('checkIn') }}" >                   

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="checkOut" class="col-md-4 col-form-label text-md-right">{{ __('checkOut') }}</label>  
                                    <div class="col-md-6">
                                        <input id="checkIn" type="time" class="form-control @error('checkOut') is-invalid @enderror" name="checkOut" value="{{ old('checkOut') }}" >                   
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-info">Actualizar</button>
                                <br>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </li>
            <br><br>
              <a href="{{ route('attention_instrument.index', $attention->id)}}" class="btn btn-info">Instrumentos</a>
            </div>
            <div class="card-footer text-muted">
              Clicica CVS
            </div>
            @endforeach
        </div>
    </div>
@endsection