<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary-gradient shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-uppercase" href="#">Java Wonderland</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/voucher-user') }}"><i class="fa-solid fa-tag"></i>Voucher</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAllTrips" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">All Trips</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAllTrips">
              <li><a class="dropdown-item active-page" href="{{ url('/pangandaran') }}">Pantai Pangandaran</a></li>
              <li><a class="dropdown-item" href="{{ url('/anyer') }}">Pantai Anyer</a></li>
              <li><a class="dropdown-item" href="{{ url('/karimun') }}">Pantai Karimun Jawa</a></li>
              <li><a class="dropdown-item" href="{{ url('/bromo') }}">Gunung Bromo</a></li>
              <li><a class="dropdown-item" href="{{ url('/sindoro') }}">Gunung Sindoro</a></li>
              <li><a class="dropdown-item" href="{{ url('/kawah') }}">Gunung Ijen</a></li>
            </ul>
          </li>
          
          <li class="nav-item"><a class="nav-link" href="{{ url('/gallery') }}"><i class="fas fa-images me-1"></i>Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}"><i class="fas fa-info-circle me-1"></i>About Us</a></li>
  
          <li class="nav-item">
            
                <a class="nav-link" href="{{ route('pemesanan.daftar.home') }}">
                  <i class="fa-solid fa-cart-shopping"></i>Pesanan
                </a>
          </li>
          <li>
                <a class="nav-link" href="{{ route('review.index') }}">
                    <i class="fas fa-comments me-1"></i>review
                </a>
            
          </li>
        <li class="nav-item">
          @if(Auth::check())
          <div class="nav-links-container">
            <a class="nav-link" href="{{ route('profile') }}" id="profileButton">
                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
            </a>
        </div>
          @else
              <a class="nav-link" href="{{ route('login') }}" id="loginButton">
                  <i class="fas fa-user me-1"></i>Login
              </a>
          @endif
        </li>
        </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Konten Utama -->
    <div class="content">
      <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <!-- Indicators -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
    
          <!-- Carousel Items -->      
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('images/gambar bromo.jpeg') }}" class="d-block w-100 img-fluid" alt="Gunung Bromo">
              <div class="carousel-caption d-md-block text-center">
                <h2 class="display-5 text-light">Hi, Travelers</h2>
                <h1 class="display-1 fw-bold text-light">Gunung Bromo</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/gunung-sindoro.jpeg') }}" class="d-block w-100 img-fluid" alt="Gunung Sindoro">
              <div class="carousel-caption d-md-block text-center">
                <h2 class="display-5 text-light">Hi, Travelers</h2>
                <h1 class="display-1 fw-bold text-light">Gunung Sindoro</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/anyer.jpg') }}" class="d-block w-100 img-fluid" alt="Pantai Anyer">
              <div class="carousel-caption d-md-block text-center">
                <h2 class="display-5 text-light">Hi, Travelers</h2>
                <h1 class="display-1 fw-bold text-light">Pantai Anyer</h1>
              </div>
            </div>
          </div>
          
          
    
          <!-- Controls for next and previous -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    
      <!-- Pop-up Notification (Travel Bus Animation) -->
      <div id="popupBus" class="popup-bus">
        <i class="fas fa-bus bus-icon"></i>
        <div class="popup-content">
          <h5>Special Offer!</h5>
          <p>Book your next trip with Java Wonderland and get a 20% discount!</p>
        </div>
        <button id="closePopup" class="btn-close" aria-label="Close" style="background: none; border: none; color: #fff;">&times;</button>
      </div>

      
    
      <section class="activities py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Kegiatan Seru di Pantai Anyer</h2>
            <div class="row g-4">
                <!-- Kegiatan Berjemur -->
                <div class="col-md-4 scroll-animation">
                    <a href="{{ url('/anyer') }}" class="activity-link">
                        <div class="activity-card">
                            <img src="{{ asset('images/jemur.jpg') }}" class="img-fluid activity-img" alt="Berjemur">
                            <h4 class="mt-3">Berjemur dan Piknik di Pantai</h4>
                            <p>Pasir putih yang bersih dan pemandangan laut yang luas membuatnya menjadi tempat yang ideal untuk bersantai, membaca buku, atau bermain voli pantai.</p>
                        </div>
                    </a>
                </div>
    
                <!-- Kegiatan Snorkeling -->
                <div class="col-md-4 scroll-animation">
                    <a href="{{ url('/anyer') }}" class="activity-link">
                        <div class="activity-card">
                            <img src="{{ asset('images/Snorkling Pangandaran.jpg') }}" class="img-fluid activity-img" alt="Snorkeling">
                            <h4 class="mt-3">Snorkeling</h4>
                            <p>Menjelajahi kehidupan bawah laut sekitar Pantai Anyer. Beberapa spot snorkeling dan diving menawarkan pemandangan terumbu karang yang masih alami, serta berbagai jenis ikan tropis.</p>
                        </div>
                    </a>
                </div>
    
                <!-- Kegiatan Bermain Jetski -->
                <div class="col-md-4 scroll-animation">
                    <a href="{{ url('/anyer') }}" class="activity-link">
                        <div class="activity-card">
                            <img src="{{ asset('images/jetski.jpg') }}" class="img-fluid activity-img" alt="Jetski">
                            <h4 class="mt-3">Bermain Jetski</h4>
                            <p>Pantai Anyer juga menyediakan kegiatan jetski. Kamu bisa menjelajahi laut lepas dengan kecepatan tinggi. Kamu bisa merasakan adrenalin saat meluncur di atas air.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    
      <!-- Custom JavaScript -->
<script src="{{ asset('js/home.js') }}"></script>
      <script>
      $(document).ready(function() {
      // Menampilkan popup setelah 3 detik
      setTimeout(function() {
        $('#popupBus').css('left', '20px'); 
      }, 3000);
    
      // Menutup popup ketika tombol "Close" diklik
      $('#closePopup').click(function() {
        $('#popupBus').css('left', '-900px'); 
      });
    
      // Popup akan otomatis keluar setelah 10 detik
      setTimeout(function() {
        $('#popupBus').css('left', '-900px'); 
      }, 10000);
    });
    
    
    </script>
    
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Java Wonderland. All Rights Reserved.</p>
    </footer>
</body>
</html>


