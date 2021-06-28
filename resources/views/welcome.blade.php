@extends('layouts.nav')
@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br><br><br>      
                <img style="background-size: cover; height: 90%;
                width: 100%; margin-right: 10%;" src="{{asset('./Icons/enfermera.jpg')}}" class="img-fluid">
            <br><br>   
        </div>
        <br><br>
        <div class="col-md-6">
            <br>
            <h1 style="color: #0b924a"><b>Nuestra Misión</b></h1>
            <h5>Las Clínicas JALDIN están suscritas a un decálogo de ética y compromiso con sus pacientes, cuya misión es resolver de manera global cualquier inquietud estética por medio de las diferentes unidades Médicas y Quirúrgicas de las que disponemos, aumentando la calidad de vida de las personas con las mínimas molestias y con el coste más bajo posible y contando con las técnicas más innovadoras, las mejores clínicas y los profesionales más preparados que garantizan la mayor seguridad, calidad y bienestar a nuestros pacientes.</h5>
            <h1 style="color: #0b924a"><b>Nuestra Visión</b></h1>
            <h5>Estar cada vez más cerca del paciente a través de la apertura de nuevas clínicas en España, alentando y motivando continuamente a nuestro equipo humano para que mantenga su rigor, profesionalidad y ética.</h5>
            <h1 style="color: #0b924a"><b>Nuestros Valores</b></h1>
            <h5>
                <ul>
                    <li>Realizar nuestro trabajo con la pasión, dedicación y entusiasmo necesario para llevar a cabo nuestra misión.</li>
                    <li>Honestidad, para transmitir confianza en todos los ámbitos ajustándonos siempre a la verdad.</li>
                    <li>Respeto a nuestros pacientes mejorando tu calidad de vida.</li>
                </ul>
            </h5>
            
            <div class="mt-5">
                @guest
                <a href="/login"><button type="button" class="btn btn-info">Login <i class="fas fa-heartbeat"></i> </button></a> 
                @endguest       
            </div>
            
        </div>
    </div>
    <br>
    <br>
</div>
@endsection