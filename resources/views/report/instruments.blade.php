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
            <li class="list-group-item"><h2>Insumos</h2></li>
        </ul>
        <br>
        <form action={{ route('instruments.createOne') }} method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Instrumento</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" name="price" class="form-control" id="price" aria-describedby="price">
                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" aria-describedby="stock">
                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <select name="instrument_type_id" id="instrument_type_id">
                    <option value="">--selecciona tu tipo de instrumento--</option>
                   @foreach ($instrument_types as $instrument_type)                                        
                   <option value="{{$instrument_type->id}}">{{" -> ".$instrument_type->name}}</option>                                    
                   @endforeach 
                </select>
                @error('instrument_type_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        <table class="table table-striped">
            <thead>
                  <th>Insumo</th>
                  <th>Clasificacion</th>
                  <th>Precio </th>
                  <th>Stock </th>
                  <th>Opciones</th> 
                  <th></th>
            </thead>
            <tbody>
                @foreach ($instruments as $instrument)
                   <tr>
                        <td>{{$instrument->name}}</td>   
                        <td>{{$instrument->instrument_type->name}}</td>   
                        <td>{{$instrument->price}}</td>
                        <td>{{$instrument->stock}}</td>  
                        <td><a href="{{route('instruments.editOne', $instrument->id)}}"><button type="button" class="btn btn-info">Editar</button></a> </td>        
                        <td>
                            @if ($instrument->status==1)
                            <a href="{{route('instruments.desactivateOne', $instrument->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('instruments.activateOne', $instrument->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                          
                        </td>             
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$instruments->links()}}</div>
    </div>
@endsection