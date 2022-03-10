<!DOCTYPE html>
<html lang="es">

@include('layouts.app.partials.head')

<body>
    @include('layouts.contents.header')
    
    <main id="main">
        <div class="autocomplete-app">
            <h1 class="pt-3">Calculador de rutas</h1>
            <div class="container autocomplete-div">
                <form action="" role="form" method="POST" id="new-delivery">
                    @csrf

                    <div class="row text-start">
                        <div class="col-lg-12 mb-3">
                            <label for="autocomplete-app" class="form-fields">Dirección</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" name="autocomplete-app" id="autocomplete-app" class="form-control py-3"></input>
                        </div>
                    </div>

                    <div class="row text-start">
                        <div class="col-lg-12 mb-3">
                            <label for="name-app" class="form-fields">Nombre</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" name="name-app" id="name-app" class="form-control py-3" placeholder="Nombre"></input>
                        </div>
                    </div>

                    <div class="row text-start">
                        <div class="col-lg-12 mb-3">
                            <label for="tracking-number-app" class="form-fields">Número de seguimiento</label>
                            <input type="text" name="tracking-number-app" id="tracking-number-app" class="form-control py-3" placeholder="Número de seguimiento"></input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <button class="btn btn-danger container" id="btn-add-delivery">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <button class="btn btn-danger container" id="btn-calculate-route">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="map-section container">
            <div id="map"></div>
        </div>

        <div class="points-section container">
            
        </div>

        {{-- <div class="col-lg-12">
                <div class="dt-app"></div>
            </div> --}}
            
        <!-- Pantalla de carga -->
        <div id="loading"></div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{asset('/vendor/index/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0AUVJat2__UhZ8msExOQa5xYZpigP8Ew&libraries=places"></script>
    <script src="{{asset('/js/app/app.js')}}"></script>
    <script src="{{asset('/js/app/calculate.js')}}"></script>

    <!-- Vendor JS Files -->
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.6/swiper-bundle.min.js" integrity="sha512-4w/aaXboO6KY1E/dqYwfq09sZnM+XDIcWvmHhfxvMQ+qwK84kxgWtNkAqbFNMLYd6EYA3nSgxTSyif/D3vlVMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- Template Main JS File -->
    <script src="js/index/main.js"></script>

</body>



{{-- @include('layouts.app.partials.header')
@include('layouts.app.partials.body') --}}

</html>
