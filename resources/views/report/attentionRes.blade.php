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
    {{-- {{dd($attention)}} --}}
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Atencion
            </div>
            <div class="card-body">
              <h5 class="card-title">Datos</h5>
              <p class="card-text">
                @foreach ($attention as $attentio)
                <ul class="list-group">
                    <li class="list-group-item">{{"Hora de llegada: ". $attentio->checkIn}}</li>
                    <li class="list-group-item">{{"Hora de finalizacion: ". $attentio->checkOut}}</li>
                    <li class="list-group-item">{{"Fecha: ". $attentio->date->toFormattedDateString()}}</li>
                    <li class="list-group-item">{{"Precio total: ". $attentio->totalPrice}}</li>
                    <li class="list-group-item">{{"Personal medico: ". $attentio->nurse->name}}</li>
                    <li class="list-group-item">{{"Paciente: ". $attentio->patient->name}}</li>
                </ul>
                @php
                    $at = $attentio->id;
                @endphp
                @endforeach
              </p>
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
                        <form action={{ route('attention.update', $at) }} method="POST">
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
              <a href="#" class="btn btn-info">Instrumentos</a>
            </div>
            <div class="card-footer text-muted">
              Clicica CVS
            </div>
        </div>
    </div>
</body>
</html>