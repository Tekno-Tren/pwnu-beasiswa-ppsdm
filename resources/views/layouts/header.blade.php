  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href={{ route('landing') }}><span>PPSDM </span>PWNU</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href={{ route('landing') }}>Beranda</a></li>

          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#about-us">Tentang Kami</a></li>
              <li><a href="#dokumentasi">Dokumentasi</a></li>
              <li><a href="#mitra">Kampus Mitra</a></li>
              <li><a href="#footer">Kontak</a></li>
            </ul>
          </li>

          @if (Auth::check())
            <li><a href={{ route('filament.app.pages.dashboard') }}>Dashboard</a></li>
            <li>
                <form action="{{ route('filament.app.auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 10px 0 10px 30px;
                    padding-top: 10px;
                    padding-right: 0px;
                    padding-bottom: 10px;
                    padding-left: 30px;
                    font-family: 'Roboto', sans-serif;
                    font-size: 13px;
                    font-weight: 600;
                    color: #111;
                    white-space: nowrap;
                    text-transform: uppercase;
                    transition: 0.3s;
                    transition-duration: 0.3s;
                    transition-timing-function: ease;
                    transition-delay: 0s;
                    transition-property: all;
                    background: none; border: none;">Logout</button>
                </form>
            </li>
          
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
