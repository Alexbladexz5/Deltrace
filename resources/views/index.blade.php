<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Deltrace</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/index/aos/aos.css" rel="stylesheet">
  <link href="vendor/index/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/index/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/index/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/index/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/index/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/index/style.css" rel="stylesheet">

</head>

<body>

  @include('layouts.contents.header')

  @include('layouts.contents.hero')

  <main id="main">

    @include('layouts.contents.about')

    @include('layouts.contents.services')

    @include('layouts.contents.cta')

    @include('layouts.contents.pricing')

    @include('layouts.contents.team')

    @include('layouts.contents.contact')

  </main>

  @include('layouts.contents.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="vendor/index/aos/aos.js"></script>
  <script src="vendor/index/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/index/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/index/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/index/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/index/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/index/main.js"></script>

</body>

</html>