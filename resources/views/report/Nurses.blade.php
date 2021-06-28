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
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>Personal medico</h2></li>
            <li class="list-group-item"><a href= {{route('user.register') }} ><button type="button" class="btn btn-success btn-lg btn-block">Nuevo usuario</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Username</th>
                  <th>email</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td> 
                        <td>{{$user->user}}</td> 
                        <td>{{$user->email}}</td>             
                        <td>
                            <a href="{{route('user.permissions',$user->id)}}"><button type="button" class="btn btn-warning">Roles</button></a>
                            <a href="{{route('user.specialities',$user->id)}}"><button type="button" class="btn btn-info">Espercialidades</button></a>
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$users->links()}}</div>
    </div>
@endsection