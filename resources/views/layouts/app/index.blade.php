<!DOCTYPE html>
<html lang="es">

<head>
    <title>Deltrace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css\app\wave.css') }}" rel="stylesheet" type="text/css" media="all">
    {{-- POSIBLE CÓDIGO A ELIMINAR --}}
    {{--<link href="{{ asset('css\app\layout.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css\app\framework.css') }}" rel="stylesheet" type="text/css" media="all">--}}
    
</head>

<body>
    <div class="headerWave">
        <!--Content before waves-->
        <div class="inner-headerWave flex">
            <h1>Calculador de rutas</h1>
            <input type="text" id="autocomplete" class="form-control"></input>
        </div>

        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
   </div> 
    <!--Waves end-->

</body>

{{-- @include('layouts.app.partials.header')
@include('layouts.app.partials.body') --}}

</html>
