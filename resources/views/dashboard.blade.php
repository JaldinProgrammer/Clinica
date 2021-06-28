@extends('layouts.nav')
@section('content')
    <br>
        <div class="container">
            <div class="card-body">     
                    <ul class="list-group list-group-flush "> 
                        <li class="list-group-item" style="text-align: center">{{"Nombre: ".Auth::user()->name}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->user}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Telefono: ".Auth::user()->phone}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Email: ".Auth::user()->email}}</li>
                        <li class="list-group-item" style="text-align: center"><a href= {{route('user.perfil.locations',Auth::user()->id ) }} ><button type="button" class="btn btn-success btn-lg btn-block">Mis direcciones</button></a></li>
                    </ul>
            </div>
        </div>                
    <br>
@endsection