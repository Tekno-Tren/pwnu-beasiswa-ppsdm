<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIM Beasiswa PWNU | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.js')}}" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/bootstrap.js') }}">
  <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>

</head>

<body>

  @include('layouts.header')

  @yield('content')
  {{-- <div class="col-md-9 text-center mx-auto">
    @yield('form')
  </div> --}}

  @include('layouts.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- <script src="assets/vendor/glightbox/js/glightbox.min.js"></script> --}}
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
