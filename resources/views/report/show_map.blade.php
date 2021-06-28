<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/hospital.png')}}">
    <title>Laboratorio</title>
</head>
<body>
    @include('layouts.nav')
       <div class="container">
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>{{"Titulo : ". $location->title}}</h2></li>
            <li class="list-group-item"><h2>{{"Detalles : ". $location->details}}</h2></li>
        </ul>
        <br>
           <input type="hidden" id="latitude" value={{$location->latitude}}>
           <input type="hidden" id="longitude" value={{$location->longitude}}>
       </div>
       <div class="container">
        <div id="map" style="height: 800px ; width: 100%;"></div>
       </div>
       
       <script>
           function iniciarMap(){
            var coord = {lat: parseFloat(document.getElementById('latitude').value) ,lng: parseFloat(document.getElementById('longitude').value)};
            var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 17,
            center: coord
            });
            var marker = new google.maps.Marker({
            position: coord,
            map: map
            });
        }
       </script>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>
</html>