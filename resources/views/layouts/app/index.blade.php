<!DOCTYPE html>
<html lang="es">

@include('layouts.app.partials.head')

<body>
    <div class="headerWave">
        <!--Content before waves-->
        <div class="inner-headerWave flex">
            <h1>Calculador de rutas</h1>
            <div class="container">
                <div class="row">
                    <input type="text" id="autocomplete-app" class="form-control"></input>
                    <button></button>
                </div>
            </div>
            
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
    <script src="{{asset('/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/index/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0AUVJat2__UhZ8msExOQa5xYZpigP8Ew&libraries=places"></script>
    <script src="{{asset('/js/app/app.js')}}"></script>

</body>

{{-- @include('layouts.app.partials.header')
@include('layouts.app.partials.body') --}}

</html>
