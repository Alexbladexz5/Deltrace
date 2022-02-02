<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Deltrace</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/index/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/index/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/index/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/index/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/index/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/index/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/index/style.css') }}" rel="stylesheet">

</head>

<body>

  @include('layouts.contents.header')

  <main id="main">

    @include('layouts.contents.showProfile')
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/index/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/index/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/index/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/index/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/index/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/index/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/index/main.js')}}"></script>

</body>

</html>