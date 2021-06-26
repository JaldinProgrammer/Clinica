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
        <a href= {{route('reservation.register', Auth::user()->id) }} ><button type="button" class="btn btn-success btn-lg btn-block">Nuevo reservacion</button></a>
        <h1>Reservas</h1>
        <table class="table table-striped">
            <thead>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Detalle</th>                
                  <th>Virtual link</th>
                  <th>Pago virtual</th>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                   <tr>
                        <td>{{$reservation->date}}</td>
                        <td>{{$reservation->time}}</td>
                        <td>{{$reservation->details}}</td>                         
                        <td>{{$reservation->virtualMeeting}}</td>  
                        <td>{{$reservation->virtualPayment}}</td>           
                        <td>
                            {{-- 0 no agendada 1 agendada 2 dada de baja --}}
                            @if ($reservation->status == 0)  
                            <a href="{{route('reservation.delete', $reservation->id)}}"><button type="button" class="btn btn-danger" >Dar de baja</button></a>                   
                            @endif
                            {{-- <a href="{{route('reservation.edit',$reservation->id)}}"><button type="button" class="btn btn-info">Editar</button></a> --}}
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="table table-striped">{{$reservations->links()}}</div>
    </div>

</body>
</html>