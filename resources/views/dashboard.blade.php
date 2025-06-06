@extends('layouts.base')
@section('title', 'Dashboard')

@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/picture1-landingpage.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>PPSDM PWNU Jatim</span></h2>
              <p>Koordinatorat Bidang PPSDM (Pengembangan dan Pendidikan Sumber Daya Manusia) PWNU Jawa Timur</p>
              <div class="text-center"><a href={{ route('filament.app.auth.login') }} class="btn-get-started">LOGIN</a></div>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col">
            <h2 class="text-center fs-2">Latar Belakang</h2>
            <p class="text-justify">Nahdlatul sebagai organisasi kemasyarakatan jenis keagamaan Islam terbesar di Indonesia dan tersebar di berbagai negara memiliki tanggung jawab moral dan strategis dalam mencetak generasi muda yang tidak hanya berilmu, tetapi juga berakhlak mulia dan berjiwa kebangsaan. Dinamika zaman yang semakin kompleks, tantangan dalam dunia pendidikan pun kian meningkat, baik dari sisi biaya, akses, maupun kualitas. Indonesia Emas tahun 2045 adalah sebuah visi besar bangsa yang perlu diwujudkan bersama sama dan NU mengambil peran strategis guna memenangkan Indonesia Emas 20245. Salah satu ikhtiyar yang dilakukan oleh Nahdlatul Ulama adalah merawat jagad dan membangun peradaban yang dimulai dengan pengembangan dan penyiapan sumber daya manusia yang berdaya saing global.</p>
            <p class="text-justify">Provinsi Jawa Timur sebagai basis terbesar warga Nahdliyin masih menemukan bahwa banyak generasi muda NU yang memiliki potensi besar namun terhambat oleh keterbatasan ekonomi untuk melanjutkan pendidikan ke jenjang yang lebih tinggi. Lain daripada itu, kemajuan teknologi dan arus globalisasi menuntut hadirnya generasi muda NU yang kompeten, berpikiran terbuka, berdaya saing global dan tetap berpegang pada nilai-nilai Ahlussunnah wal Jama’ah An Nahdliyah. Atas dasar tersebut, Pengurus Wilayah Nahdlatul Ulama (PWNU) Jawa Timur melalui Tim Program Pengembangan Sumber Daya Manusia dan Pengabdian Masyarakat (PPSDM) memandang perlu untuk menghadirkan solusi konkret yang diwujudkan dalam bentuk Program Beasiswa PWNU Jawa Timur yang bekerjasama dengan Perguruan Tinggi Negeri (PTN), Perguruan Tinggi Keagamaan Islam Negeri (PTKIN) dan Perguruan Tinggi Nahdlatul Ulama di Jawa Timur.</p>
            <p class="text-justify">Program ini tidak hanya bertujuan untuk memberikan bantuan finansial, tetapi juga menjadi sarana kaderisasi dan pembinaan karakter bagi generasi muda NU agar dapat menjadi pemimpin masa depan yang berilmu, berintegritas, dan siap berkhidmat untuk umat, bangsa, dan jam’iyah. Program ini merupakan bagian dari ikhtiar besar PWNU Jawa Timur dalam memajukan pendidikan, memperluas kesempatan belajar, serta menyiapkan SDM unggul yang siap menjawab tantangan zaman tanpa kehilangan akar tradisi dan spiritualitasnya.</p>
          </div>
          <p></p>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2 class="text-center fs-2">Tujuan</h2>
            <ul>
              <li><i class="ri-check-double-line"></i> Memberikan akses pendidikan yang lebih luas bagi kader muda Nahdlatul Ulama di Jawa Timur yang memiliki potensi akademik namun terbatas secara ekonomi.</li>
              <li><i class="ri-check-double-line"></i> Mencetak generasi muda NU yang unggul, baik dalam bidang akademik, kepemimpinan, maupun akhlak, sebagai bagian dari upaya menciptakan sumber daya manusia yang berkualitas dan berdaya saing tinggi.</li>
              <li><i class="ri-check-double-line"></i> Menumbuhkan semangat belajar, profesionalisme, dan tanggung jawab sosial di mahasiswa NU sebagai modal utama dalam membangun masyarakat dan bangsa.</li>
              <li><i class="ri-check-double-line"></i> Membangun kaderisasi berkelanjutan di lingkungan NU, melalui pembinaan, pelatihan, dan pendampingan terhadap penerima beasiswa agar menjadi pemimpin masa depan yang berlandaskan nilai-nilai Ahlussunnah wal Jama’ah An Nahdliyah.</li>
              <li><i class="ri-check-double-line"></i> Memperkuat peran PWNU Jawa Timur dalam bidang pendidikan dan pengembangan SDM, sebagai bentuk kontribusi nyata terhadap umat, negara, agama dan jam’iyah.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-right">
            <h2 class="text-center fs-2">Manfaat</h2>
            <ul>
              <li><i class="ri-check-double-line"></i> Meningkatkan akses dan pemerataan pendidikan bagi mahasiswa dari kalangan warga Nahdlatul Ulama yang memiliki keterbatasan ekonomi namun berprestasi yang nantinya disiapkan sebagai generasi muda NU yang cerdas, berkarakter, kompeten dan berkontribusi, baik di tingkat lokal, nasional, maupun global.</li>
              <li><i class="ri-check-double-line"></i> Menjadi media kaderisasi bagi NU dalam menyiapkan calon-calon pemimpin masa depan yang memiliki kapasitas keilmuan dan komitmen keorganisasian.</li>
              <li><i class="ri-check-double-line"></i> Memperkuat loyalitas dan identitas ke-NU-an di kalangan generasi muda melalui pembinaan spiritual, ideologis, sosial dan sikap profesional selama masa penerimaan beasiswa.</li>
              <li><i class="ri-check-double-line"></i> Meningkatkan kualitas sumber daya manusia Nahdliyin, sehingga lebih siap menghadapi tantangan zaman di berbagai bidang, termasuk pendidikan, ekonomi, teknologi, dan sosial budaya.</li>
              <li><i class="ri-check-double-line"></i> Membangun jejaring alumni penerima beasiswa yang dapat menjadi kekuatan strategis NU dalam berbagai sektor kehidupan masyarakat baik pada masa sekarang maupun di masa yang mendatang.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Penerima</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="m-3 icon-box iconbox-blue w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
              <h4><a href="">400 Penerima</a></h4>
              <p>2019-2020</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="m-3 icon-box iconbox-orange w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a href="">134 Penerima</a></h4>
              <p>2020-2021</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="m-3 icon-box iconbox-pink w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4><a href="">184 Penerima</a></h4>
              <p>2021-2022</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="m-3 icon-box iconbox-yellow w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bx bx-layer"></i>
              </div>
              <h4><a href="">234 Penerima</a></h4>
              <p>2022-2023</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="500">
            <div class="m-3 icon-box iconbox-red w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="bx bx-slideshow"></i>
              </div>
              <h4><a href="">352 Penerima</a></h4>
              <p>2023-2024</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-0" data-aos="zoom-in" data-aos-delay="500">
            <div class="m-3 icon-box iconbox-blue w-100">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class='bx  bx-pencil'></i> 
              </div>
              <h4><a href="">398 Penerima</a></h4>
              <p>2024-2025</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="dokumentasi"></div>
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <div class="section-title">
              <h2>Dokumentasi Kegiatan</h2>
            </div>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/Picture1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>App</p> --}}
              {{-- <a href="assets/img/portfolio/Picture1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/Picture2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Web</p> --}}
              {{-- <a href="assets/img/portfolio/Picture2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/Picture3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>App</p> --}}
              {{-- <a href="assets/img/portfolio/Picture3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/Picture4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Card</p> --}}
              {{-- <a href="assets/img/portfolio/Picture4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/Picture5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Web</p> --}}
              {{-- <a href="assets/img/portfolio/Picture5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/Picture6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>App</p> --}}
              {{-- <a href="assets/img/portfolio/Picture6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/Picture7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Card</p> --}}
              {{-- <a href="assets/img/portfolio/Picture7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/Picture8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Card</p> --}}
              {{-- <a href="assets/img/portfolio/Picture8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/Picture9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dokumentasi Kegiatan</h4>
              {{-- <p>Card</p> --}}
              {{-- <a href="assets/img/portfolio/Picture9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a> --}}
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <div id="mitra"></div>
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mitra</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

          {{-- UNISMA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Unisma.png" class="img-fluid" style="width: 40%; height: auto;" alt="">
            </div>
          </div>

          {{-- UNUSA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Unusa.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UPN --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/UPN-Veteran.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UTM --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/UTM.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UNESA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Unesa.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UB --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/UB.png" class="img-fluid w" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UINSA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Uinsa.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UINMA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/UIN-Malang.png" class="img-fluid" style="width: 28%; height: auto;" alt="">
            </div>
          </div>

          {{-- POLINEMA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Polinema.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- UINKHAS --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Uinkhas.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- ITS --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/ITS.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- POLTERA --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/Poltera.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

          {{-- IAINMadura --}}
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/logo-univ-mitra/IAINMadura.png" class="img-fluid" style="width: 25%; height: auto;" alt="">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
