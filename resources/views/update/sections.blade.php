@extends('layouts.nav')
@section('content')
    
    <div class="container"> 
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>Actualizar seccion</h2></li>
        </ul>
        <br>
        <div class="card-body">
            <form method="POST" action="{{ route('sections.update', $section->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Secccion') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $section->name }}"  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $section->price }}"  autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-info ">
                            {{ __('Actualizar') }}
                            <i class="fas fa-heartbeat"></i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>  
@endsection