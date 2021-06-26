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
    <div class="container"> 
        <h1>Reservaciones</h1> 
        <div class="card-body">
            <form method="POST" action="{{ route('reservation.create') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

                    <div class="col-md-6">
                        <input id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}"  autofocus>

                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                    <div class="col-md-6">
                        <input id="user" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"  autocomplete="date" autofocus>

                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>

                    <div class="col-md-6">
                        <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}"  autocomplete="time">

                        @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion') }}</label>
                    <div class="col-md-6">
                        <select name="location_id" id="location_id">
                            <option value="">--selecciona tu ubicacion--</option>
                        @foreach ($locations as $location)                                        
                        <option value="{{$location->id}}">{{" -> ".$location->title}}</option>                                    
                        @endforeach 
                        </select>
                        @error('location_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="service_id" class="col-md-4 col-form-label text-md-right">{{ __('Servicio') }}</label>
                    <div class="col-md-6">
                        <select name="service_id" id="service_id">
                            <option value="">--selecciona tu servicio--</option>
                        @foreach ($services as $service)                                        
                        <option value="{{$service->id}}">{{" -> ".$service->name}}</option>                                    
                        @endforeach 
                        </select>
                        @error('service_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-info ">
                            {{ __('Registrar') }}
                            <i class="fas fa-paw"></i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>  
</body>
</html>