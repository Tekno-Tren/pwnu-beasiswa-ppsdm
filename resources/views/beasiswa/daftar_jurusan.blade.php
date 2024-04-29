<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIM Beasiswa PWNU | @yield('Pendaftaran Beasiswa')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
  <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script> 

</head>

<body>

  {{-- @include('layouts.header') --}}

  @yield('content')
  <div class="col-md-9 text-center mx-auto">
    @yield('form')  
    <div class="my-5">
        <form action="{{ route('beasiswa.daftar.jurusan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            
            <div class="form-group row">
                <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                <div class="col-sm-8">
                    <select name="jurusan" id="jurusan">
                        @foreach ($jurusan as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>                            
                        @endforeach
                    </select>
                </div>
            </div>
            
            <p>
            <div class="modal-footer">
                <a href="/" class="btn btn-primary">Tutup</a>
                <button type="submit" name="beasiswadaftarjurusan" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>      
  </div>
  
  {{-- @include('layouts.footer') --}}

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>