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
            <li class="list-group-item"><h2>Insumos ocupados en la atencion</h2></li>
        </ul>
        <form action={{ route('attention_instrument.create') }} method="POST">
            @csrf
            
            <div class="md-3">
                <label for="instrument_id" class="form-label">Insumos</label>
                <select name="instrument_id" id="instrument_id">
                    <option value="">--selecciona tu insumo--</option>
                   @foreach ($instruments as $instrument)                                        
                   <option value="{{$instrument->id}}">{{" -> ".$instrument->name}}</option>                                    
                   @endforeach 
                </select>
            </div>
            <div class="mb-3">
              <label for="amount" class="form-label">Cantidad</label>
              <input type="number"  min="0" name="amount" class="form-control" id="amount" >
              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <input type="hidden" name="attention_id" value="{{$attention->id}}">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <br> 
        <table class="table table-striped">
            <thead>
                  <th>Insumo </th>
                  <th>Cantidad</th> 
                  <th>Opciones</th> 
            </thead>
            <tbody>
                @foreach ($attention_instruments as $attention_instrument)
                   <tr>
                        <td>{{$attention_instrument->instrument->name}}</td>    
                        <td>{{$attention_instrument->amount}}</td>          
                        <td>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h4 class="accordion-header" id="headingOne">
                                    <button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      {{"Editar ". $attention_instrument->instrument->name}}
                                    </button>
                                  </h4>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action={{ route('attention_instrument.update', $attention_instrument->id) }} method="POST">
                                            @csrf
                                            <div class="mb-3">                                    
                                              <input value="{{$attention_instrument->amount}}" placeholder="amount"  min="0" type="number" name="amount" class="form-control" id="amount" aria-describedby="amount">
                                              {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
                                            </div>
                                            <button type="submit" class="btn btn-info">Actualizar</button>
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
        <div class="table table-striped">{{$attention_instruments->links()}}</div>
    </div>
@endsection