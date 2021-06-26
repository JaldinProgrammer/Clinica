
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-ompatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>LABORATORIO</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">laboratorio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              @guest
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li> 
              @endguest
              @auth
              <li class="nav-item">
                <a class="nav-link"href="{{route('user.perfil')}}">{{"perfil de ".Auth::user()->name}}</a>
              </li>
              @endauth
              @can('patient')
              <li class="nav-item">
                <a class="nav-link"href={{ route('user.perfil.locations', Auth::user()->id) }}>Mis ubicaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="{{route('reservation.myReservations', Auth::user()->id)}}">Mis reservas</a>
              </li>
              @endcan
              @can('nurse')      
                <li class="nav-item">
                  <a class="nav-link"href="{{route('reservation.all')}}">Reservaciones pendientes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{route('schedule.mySchedule', Auth::user()->id)}}">Mi agenda</a>
                </li>      
              @endcan
              @can('admin')
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Gestionar Usuarios
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('user.all')}}">Usuarios</a>
                    <a class="dropdown-item" href="{{route('speciality.all')}}">Especialidades</a>
                    <a class="dropdown-item" href="{{route('showNurses')}}">Personal medico</a>
                    <a class="dropdown-item" href="{{route('showPatients')}}">Pacientes</a>
                    <a class="dropdown-item" href="{{route('showAdmins')}}">Administradores</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Gestionar Atenciones
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Atenciones</a>
                    <a class="dropdown-item" href="{{route('instrument.all')}}">Tipos de insumos</a>
                    <a class="dropdown-item" href="{{route('instruments.eachOne')}}">Insumos</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Gestionar Reservas
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('sections.all')}}">Secciones</a>
                    <a class="dropdown-item" href="#">Ubicaciones</a>
                    <a class="dropdown-item" href="{{route('reservation.all')}}">Todas las reservaciones</a>
                    <a class="dropdown-item" href="{{route('service.all')}}">Servicios</a>
                </div>
              </li>
              @endcan
              @auth
              <li class="nav-item">
                <form style="display: inline" action="/logout" method="POST">
                    @csrf
                    <a class="nav-link" href="#" onclick="this.closest('form').submit()">Logout</a>
                </form>
              </li>
              @endauth  
            </ul>
          </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>


