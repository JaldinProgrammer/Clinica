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
            <li class="list-group-item"><h2>Actualizar insumo</h2></li>
        </ul>
        <br>
        <form action={{ route('instruments.updateOne',$instrument->id) }} method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Instrumento</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{$instrument->name}}">
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" name="price" class="form-control" id="price" aria-describedby="price" value="{{$instrument->price}}">
                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" aria-describedby="stock" value="{{$instrument->stock}}">
                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <select name="instrument_type_id" id="instrument_type_id" value="{{$instrument->instrument_type_id}}">
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
        <br>    
    </div>
@endsection