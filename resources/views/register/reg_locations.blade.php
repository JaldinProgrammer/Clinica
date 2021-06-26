<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab</title>
    <style>
        .google_canvas{
            height: 300px ;
            width: 100%;
        }
    </style>
</head>
<body>
    {{-- AIzaSyAoQZuP2xsJzTPn0fdWj-8-wuQg386UdZI --}}
    @include('layouts.nav')

        
        <div class="container">           
            <h2>Registra tu nueva ubicacion</h2>
            <br>
            <form action={{ route('user.locations.create') }} method="POST">
                @csrf
                <div class="form-group row">
                    <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('Latitud  ') }}</label> 
                    <div class="col-md-6">
                        <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}"  autofocus>

                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br><br>
                    <label for="longitude" class="col-md-4 col-form-label text-md-right">{{ __('Longitud  ') }}</label>
                    <div class="col-md-6">
                        <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}"  autofocus>

                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    
                    <br><br>
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Ubicacion  ') }}</label>
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br><br>
                    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Numero de casa  ') }}</label>
                    <div class="col-md-6">
                        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}"  autofocus>

                        @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br><br>
                    <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Detalles') }}</label>
                    <div class="col-md-6">
                        <input id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}"  autofocus>

                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br><br>
                        <label for="section_id" class="col-md-4 col-form-label text-md-right">{{ __('Seccion') }}</label>
                        <div class="col-md-6">
                            <select name="section_id" id="section_id">
                                <option value="">--selecciona tu seccion--</option>
                               @foreach ($sections as $section)                                        
                               <option value="{{$section->id}}">{{" -> ".$section->name}}</option>                                    
                               @endforeach 
                            </select>
                            @error('section_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                    
                </div>
            </form>    
        </div>
        <br>
            <div class="container">
                <div id="mapa" style="height: 500px ; width: 100%;" ></div>
            </div>       
        <script>
            function iniciarMap(){
                var latitud = -17.783948;
                var londitud = -63.181939;

                coordenadas = {
                    lng: londitud,
                    lat: latitud
                }
                generarMapa(coordenadas);
                function generarMapa(coordenadas){
                    var mapa = new google.maps.Map(document.getElementById('mapa'), {
                        zoom: 15,
                        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    });

                    marcador = new google.maps.Marker({
                        map: mapa,
                        draggable: true,
                        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    });

                    marcador.addListener('dragend', function(event){
                        document.getElementById("latitude").value = this.getPosition().lat();
                        document.getElementById("longitude").value = this.getPosition().lng();
                    })

                }
                
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</html>