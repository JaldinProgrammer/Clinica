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
        <a href= "{{route('sections.register')}}" ><button type="button" class="btn btn-success btn-lg btn-block">Nueva seccion </button></a>
        <h1>Secciones</h1>
        <table class="table table-striped">
            <thead>
                  <th>Seccion</th>
                  <th>precio</th>
                  <th>creado en:</th>
                  <th>actualizado en:</th>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                   <tr>
                        <td>{{$section->name}}</td>
                        <td>{{$section->price}}</td> 
                        <td>{{$section->created_at}}</td> 
                        <td>{{$section->updated_at}}</td>             
                        <td>
                            <a href="{{route('sections.edit',$section->id)}}"><button type="button" class="btn btn-info">actualizar</button></a>
                            @if ($section->status == 1 )
                            <a href="{{route('sections.desactivateSection',$section->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>    
                            @else
                            <a href="{{route('sections.activateSection',$section->id)}}"><button type="button" class="btn btn-warning">activar</button></a>    
                            @endif
                            {{-- <a href="{{route('user.permissions',$user->id)}}"><button type="button" class="btn btn-warning">Roles</button></a>
                            <a href="{{route('user.specialities',$user->id)}}"><button type="button" class="btn btn-warning">Espercialidades</button></a>
                            <a href="#"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar esta especie?')">Borrar</button></a>                  --}}
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{$species->links()}}</div> --}}
    </div>

</body>
</html>