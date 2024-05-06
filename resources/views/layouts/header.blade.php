  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href={{ route('landing') }}><span>PPSDM </span>PWNU</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="route('landing')">Beranda</a></li>

          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Tentang Kami</a></li>
              <li><a href="#">Galeri</a></li>
              <li><a href="#">Testimoni</a></li>
            </ul>
          </li>

          @if (Auth::check())
            <li><a href={{ route('filament.app.pages.dashboard') }}>Dashboard</a></li>
            <li><a href={{ route('filament.app.auth.logout') }}>Logout</a></li>
          @else
            <li><a href={{ route('filament.app.auth.login') }}>Login</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="https://twitter.com/pwnujatim" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="https://www.instagram.com/pwnujatim/" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="https://www.youtube.com/@PWNUJatim" class="youtube"><i class="bu bi-youtube"></i></a>
      </div>

    </div>
  </header><!-- End Header -->
