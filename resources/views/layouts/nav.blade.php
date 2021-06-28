
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-ompatible" content="ie=edge">
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6bc26732f2.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6bc26732f2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/hospital.png')}}">
    <title>LABORATORIO</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light nav-bk3">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">
              <img src="{{asset('./Icons/hospital.png')}}" alt="pata" width="35" height="35">
              laboratorio</a>
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
                <a class="nav-link"href="{{route('user.perfil')}}">
                  <img src="{{asset('./Icons/perfil.png')}}" alt="pata" width="25" height="25">
                  {{" perfil de ".Auth::user()->name}}</a>
              </li>
              @endauth
              @can('patient')
              <li class="nav-item">
                <a class="nav-link"href={{ route('user.perfil.locations', Auth::user()->id) }}>
                  <img src="{{asset('./Icons/maps.png')}}" alt="pata" width="25" height="25">
                  Mis ubicaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href={{ route('attention.myAttentions', Auth::user()->id) }}>
                  <img src="{{asset('./Icons/patient.png')}}" alt="pata" width="25" height="25">
                  Mis atenciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="{{route('reservation.myReservations', Auth::user()->id)}}">
                  <img src="{{asset('./Icons/calendar.png')}}" alt="pata" width="25" height="25">
                  Mis reservas</a>
              </li>
              @endcan
              @can('nurse')      
                <li class="nav-item">
                  <a class="nav-link"href="{{route('reservation.all')}}">
                    <img src="{{asset('./Icons/bell.png')}}" alt="pata" width="25" height="25">
                    Reservaciones pendientes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{route('schedule.mySchedule', Auth::user()->id)}}">
                    <img src="{{asset('./Icons/calendar.png')}}" alt="pata" width="25" height="25">
                    Mi agenda</a>
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
                    <a class="dropdown-item" href="{{route('attention.index')}}">Atenciones</a>
                    <a class="dropdown-item" href="{{route('instrument.all')}}">Tipos de insumos</a>
                    <a class="dropdown-item" href="{{route('instruments.eachOne')}}">Insumos</a>
                    <a class="dropdown-item" href="{{route('binnacle.index')}}">Bitacora</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Gestionar Reservas
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('sections.all')}}">Secciones</a>
                    <a class="dropdown-item" href="{{route('locationsAll')}}">Ubicaciones</a>
                    <a class="dropdown-item" href="{{route('reservation.all')}}">Todas las reservaciones</a>
                    <a class="dropdown-item" href="{{route('service.all')}}">Servicios</a>
                </div>
              </li>
              @endcan
              @auth
              <li class="nav-item">
                <form style="display: inline" action="/logout" method="POST">
                    @csrf
                    <a class="nav-link" href="#" onclick="this.closest('form').submit()">
                      <img src="{{asset('./Icons/logout.png')}}" alt="pata" width="25" height="25">
                      {{"  Logout  "}}</a>
                </form>
              </li>
              @endauth 
              <li class="nav-item">
                <a class="nav-link"href="{{route('service.showAvailable')}}">
                  <img src="{{asset('./Icons/offer.png')}}" alt="pata" width="25" height="25">
                  Servicios ofertados</a>
              </li>  
            </ul>
          </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    @yield('content')
  </body>
</html>


