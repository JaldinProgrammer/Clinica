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
          <li class="list-group-item"><h2>Servicios</h2></li>
      </ul>
      <br>
        <form action={{ route('service.create') }} method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Servicio</label>
              <input type="text" name="name" class="form-control" id="name" >
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Descripcion</label>
              <input type="text" name="description" class="form-control" id="description" >
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" name="price" class="form-control" id="price" >
                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
              </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        <br>   
        <table class="table table-striped">
            <thead>
                  <th>Servicio </th>
                  <th>Precio</th> 
                  <th>Opciones</th> 
                  <th>Editar</th>
            </thead>
            <tbody>
                @foreach ($services as $service)
                   <tr>
                        <td>{{$service->name}}</td>    
                        <td>{{$service->price}}</td>         
                        <td>
                            @if ($service->status==1)
                            <a href="{{route('service.desactivate', $service->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('service.activate', $service->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           
                        </td>    
                        <td>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h4 class="accordion-header" id="headingOne">
                                    <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      {{"Editar ". $service->name}}
                                    </button>
                                  </h4>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action={{ route('service.update', $service->id) }} method="POST">
                                            @csrf
                                            <div class="mb-3">
                                              {{-- <label for="name" class="form-label">Nuevo tipo de instrumento</label> --}}
                                              <input value="{{$service->name}}" placeholder="servicio" type="text" name="name" class="form-control" id="name" aria-describedby="name">
                                              <input value="{{$service->price}}" placeholder="precio" type="text" name="price" class="form-control" id="price" aria-describedby="price">
                                              <input value="{{$service->description}}" placeholder="description" type="text" name="description" class="form-control" id="price" aria-describedby="price">

                                              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
                                            </div>
                                            <button type="submit" class="btn btn-info">Actualizar<i class="fas fa-heartbeat"></i></button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>             
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$services->links()}}</div>
    </div>
@endsection