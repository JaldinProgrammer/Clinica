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
        <a href= {{route('user.register') }} ><button type="button" class="btn btn-success btn-lg btn-block">Nuevo usuario</button></a>
        <h1>usuarios</h1>
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
                            <a href="#"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar esta especie?')">Borrar</button></a>                 

                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>

</body>
</html>