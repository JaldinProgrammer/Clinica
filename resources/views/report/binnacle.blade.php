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
{{-- <div class="container"> --}}
    <table class="table table-striped">
        <thead>
            <th>Usuario</th>
            <th>Cuenta</th>
            <th>Accion</th>
            <th>Tabla</th>
            <th>Afectado</th>
            <th>Fecha</th>
            <th>Hace:</th>
        </thead> 
        <tbody>
            @foreach ($binnacles as $binnacle)
            <tr>
                    <td>{{$binnacle->user->name}}</td>
                    <td>{{$binnacle->user->user}}</td>
                    <td>{{$binnacle->action}}</td>
                    <td>{{$binnacle->table}}</td>
                    <td>{{$binnacle->entity}}</td>
                    <td>{{$binnacle->created_at->toFormattedDateString()}}</td>
                    <td>{{($binnacle->created_at)? $binnacle->created_at->diffForHumans(): "-"}}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
{{-- </div> --}}
    <div class="table table-striped">{{$binnacles->links()}}</div>

@endsection