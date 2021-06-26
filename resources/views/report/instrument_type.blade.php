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
    
    <div class="container">
        <br>
        <form action={{ route('instrument.create') }} method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nuevo tipo de instrumento</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        <br>
        <h1>Tipos de insumo</h1>
        
        <table class="table table-striped">
            <thead>
                  <th>Tipo de insumo </th>
                  <th>Opciones</th> 
                  <th>Editar</th>
            </thead>
            <tbody>
                @foreach ($Instrument_types as $Instrument_type)
                   <tr>
                        <td>{{$Instrument_type->name}}</td>         
                        <td>
                            @if ($Instrument_type->status==1)
                            <a href="{{route('instrument.desactivate', $Instrument_type->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('instrument.activate', $Instrument_type->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           
                        </td>    
                        <td>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h4 class="accordion-header" id="headingOne">
                                    <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      {{"Editar ". $Instrument_type->name}}
                                    </button>
                                  </h4>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action={{ route('instrument.update', $Instrument_type->id) }} method="POST">
                                            @csrf
                                            <div class="mb-3">
                                              {{-- <label for="name" class="form-label">Nuevo tipo de instrumento</label> --}}
                                              <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                                              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
                                            </div>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
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
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>
</body>
</html>