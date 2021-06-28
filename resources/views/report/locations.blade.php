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
            @if (isset($user) && $user->id == Auth::user()->id)
            <li class="list-group-item"><a href= {{route('user.locations.register') }} >
                <button type="button" class="btn btn-success btn-lg btn-block">Nueva direccion  
                    <img src="{{asset('./Icons/mapMarker.png')}}" alt="pata" width="25" height="25">
                </button>
            </a></li>        
        @endif
        @if (isset($user))
        <li class="list-group-item"><h1>{{"Ubicaciones de ".$user->name}}</h1></li>
        @else
        <li class="list-group-item"><h1>{{"Ubicaciones de:  ".Auth::user()->name}}</h1></li>
        @endif 
        </ul>
        <br>
        {{-- I'm using isset in order to know if I got a variable "$user" inside this view --}}
       
        
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
                            <a href="#"><button type="button" class="btn btn-info">Editar</button></a>
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>

    </div>
@endsection