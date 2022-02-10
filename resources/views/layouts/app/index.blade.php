<!DOCTYPE html>
<html lang="es">

@include('layouts.app.partials.head')

<body>
    @include('layouts.contents.header')
    <div class="headerWave">
        <!--Content before waves-->
        <div class="inner-headerWave">
            <h1 class="pt-3">Calculador de rutas</h1>
            <div class="container">
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
                        <div class="col-lg-12 mb-3 position-absolute bottom-0 start-0">
                            <button class="btn btn-danger container" id="btn-add-delivery">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- <div class="col-lg-12">
                        <div class="dt-app"></div>
                    </div> --}}
                </form>
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
    {{-- <script src="{{asset('/vendor/index/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0AUVJat2__UhZ8msExOQa5xYZpigP8Ew&libraries=places"></script>
    <script src="{{asset('/js/app/app.js')}}"></script>

    <!-- Vendor JS Files -->
    <script src="vendor/index/aos/aos.js"></script>
    <script src="vendor/index/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/index/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/index/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/index/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="js/index/main.js"></script>

</body>

{{-- @include('layouts.app.partials.header')
@include('layouts.app.partials.body') --}}

</html>
