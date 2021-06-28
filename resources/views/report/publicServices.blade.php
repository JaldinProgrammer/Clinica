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
      <ul style="color: #ee144b" class="list-group list-group-flush">
          <li class="list-group-item"><b><h2>Servicios disponibles</h2></b></li>
      </ul>
      <br>
      <ul class="list-group list-group-flush">
        @foreach ($services as $service)
        <li class="list-group-item">
            <h3 style="color: #0b924a" >{{$service->name}}</h3>
            <br>
            <h5>{{$service->description}}</h5>
        </li>    
        @endforeach  
      <br>
      <div class="table table-striped">{{$services->links()}}</div>
    </div>

@endsection