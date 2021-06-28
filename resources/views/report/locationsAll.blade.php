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
            <li class="list-group-item"><h2>Ubicaciones de todos los usuarios</h1></li>
        </ul>
        
        <table class="table table-striped">
            <thead>
                  <th>Pertenece</th>
                  <th>titulo</th>
                  <th>detalles</th>
                  <th>seccion</th>
                  <th>opciones</th> 
                  <th></th>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                   <tr>
                        <td>{{$location->user->name}}</td>   
                        <td>{{$location->title}}</td>   
                        <td>{{$location->details}}</td>
                        <td>{{$location->section->name}}</td>  
                        <td><a href="{{route('user.locations.showMap', $location->id)}}"><button type="button" class="btn btn-info">Mapa</button></a></td>  
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$locations->links()}}</div>
    </div>
@endsection