<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<style>
  /* Container */
  .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Basic Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Dual Ring Spinner */
        .dual-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid transparent;
            border-top: 5px solid #3498db;
            border-bottom: 5px solid #e74c3c;
            border-radius: 50%;
            animation: dual-spin 1.5s ease-in-out infinite;
        }

        /* Pulsing Dots */
        .dots-container {
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 15px;
            height: 15px;
            background-color: #3498db;
            border-radius: 50%;
            animation: pulse 0.6s ease-in-out infinite;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* Growing Circle */
        .growing-circle {
            width: 40px;
            height: 40px;
            background-color: #3498db;
            border-radius: 50%;
            animation: grow 1s ease-in-out infinite;
        }

        /* Animations */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes dual-spin {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
        }

        @keyframes grow {
            0%, 100% { transform: scale(0.5); opacity: 0.3; }
            50% { transform: scale(1); opacity: 1; }
        }

        /* Rotating Square */
        .rotating-square {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #3482db, #cc2e2e);
            animation: rotate-square 2s infinite;
        }

        /* Bouncing Bars */
        .bars-container {
            display: flex;
            gap: 4px;
            height: 40px;
        }

        .bar {
            width: 8px;
            background-color: #3498db;
            animation: bounce 1s infinite;
        }

        .bar:nth-child(2) { animation-delay: 0.2s; }
        .bar:nth-child(3) { animation-delay: 0.4s; }
        .bar:nth-child(4) { animation-delay: 0.6s; }

        /* Circular Progress */
        .circular-progress {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: conic-gradient(#3498db 0%, transparent 0%);
            animation: progress 2s linear infinite;
        }

        /* Fading Ring */
        .fading-ring {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(52, 152, 219, 0.3);
            border-top-color: #3498db;
            border-radius: 50%;
            animation: fade-spin 1.2s cubic-bezier(0.55, 0.15, 0.45, 0.85) infinite;
        }

        /* Rotating Triangles */
        .triangles-container {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .triangle {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 25px solid #3498db;
            animation: rotate-triangle 2s infinite;
        }

        .triangle:nth-child(2) {
            animation-delay: 0.5s;
            opacity: 0.7;
        }

        /* Animations */
        @keyframes rotate-square {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }

        @keyframes bounce {
            0%, 100% { height: 20%; }
            50% { height: 100%; }
        }

        @keyframes progress {
            0% { background: conic-gradient(#3498db 0%, transparent 0%); }
            100% { background: conic-gradient(#3498db 360%, transparent 360%); }
        }

        @keyframes fade-spin {
            0% { transform: rotate(0deg); opacity: 0.8; }
            50% { transform: rotate(180deg); opacity: 0.5; }
            100% { transform: rotate(360deg); opacity: 0.8; }
        }

        @keyframes rotate-triangle {
            0% { transform: rotate(0deg) translateY(0); }
            50% { transform: rotate(180deg) translateY(10px); }
            100% { transform: rotate(360deg) translateY(0); }
        }

        /* Ripple Effect */
        .ripple {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .ripple::before,
        .ripple::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #3498db;
            opacity: 0.6;
            animation: ripple 2s infinite;
        }

        .ripple::after {
            animation-delay: 1s;
        }

        /* Rotating Cubes */
        .cube-grid {
            width: 60px;
            height: 60px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .cube {
            background-color: #3498db;
            animation: cube-rotate 1.5s infinite ease-in-out;
        }

        .cube:nth-child(2) { animation-delay: 0.2s; }
        .cube:nth-child(3) { animation-delay: 0.4s; }
        .cube:nth-child(4) { animation-delay: 0.1s; }
        .cube:nth-child(5) { animation-delay: 0.3s; }
        .cube:nth-child(6) { animation-delay: 0.5s; }
        .cube:nth-child(7) { animation-delay: 0.2s; }
        .cube:nth-child(8) { animation-delay: 0.4s; }
        .cube:nth-child(9) { animation-delay: 0.6s; }

        /* Hourglass */
        .hourglass {
            width: 40px;
            height: 40px;
            position: relative;
            animation: hourglass-rotate 2s infinite;
        }

        .hourglass::before,
        .hourglass::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 50%;
            background-color: #3498db;
            clip-path: polygon(0 0, 100% 0, 50% 100%);
        }

        .hourglass::after {
            bottom: 0;
            transform: rotate(180deg);
        }

        /* Wave Loading */
        .wave-container {
            width: 60px;
            height: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .wave-bar {
            width: 4px;
            height: 100%;
            background-color: #3498db;
            animation: wave 1s infinite ease-in-out;
        }

        .wave-bar:nth-child(2) { animation-delay: 0.1s; }
        .wave-bar:nth-child(3) { animation-delay: 0.2s; }
        .wave-bar:nth-child(4) { animation-delay: 0.3s; }
        .wave-bar:nth-child(5) { animation-delay: 0.4s; }

        /* Animations */
        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 0.6;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes cube-rotate {
            0%, 100% { transform: scale(1) rotate(0); }
            50% { transform: scale(0.5) rotate(180deg); }
        }

        @keyframes hourglass-rotate {
            0% { transform: rotate(0); }
            100% { transform: rotate(180deg); }
        }

        @keyframes wave {
            0%, 100% { transform: scaleY(0.3); }
            50% { transform: scaleY(1); }
        }

        /* DNA Helix */
        .dna-container {
            width: 50px;
            height: 60px;
            position: relative;
            perspective: 100px;
        }

        .dna-strand {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            animation: dna-rotate 2s linear infinite;
        }

        .dna-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #3498db;
            border-radius: 50%;
            animation: dna-wave 2s ease-in-out infinite;
        }

        .dna-dot:nth-child(even) {
            right: 0;
            background: #e74c3c;
        }

        /* Infinity Loader */
        .infinity {
            width: 60px;
            height: 30px;
            position: relative;
        }

        .infinity::before,
        .infinity::after {
            content: '';
            position: absolute;
            width: 15px;
            height: 15px;
            border: 3px solid #3498db;
            border-radius: 50%;
            animation: infinity 1.5s linear infinite;
        }

        .infinity::after {
            left: auto;
            right: 0;
            animation-delay: 0.75s;
        }

        /* Pulse Ring */
        .pulse-ring {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #3498db;
            position: relative;
        }

        .pulse-ring::before,
        .pulse-ring::after {
            content: '';
            position: absolute;
            border: 4px solid #3498db;
            border-radius: 50%;
            animation: pulse-ring 2s ease-out infinite;
        }

        .pulse-ring::after {
            animation-delay: 1s;
        }

        /* Galaxy Spinner */
        .galaxy {
            width: 60px;
            height: 60px;
            position: relative;
        }

        .galaxy-ring {
            position: absolute;
            border: 3px solid transparent;
            border-radius: 50%;
            animation: galaxy-spin 2s linear infinite;
        }

        .ring-1 { width: 60px; height: 60px; border-top-color: #3498db; }
        .ring-2 { width: 45px; height: 45px; border-right-color: #e74c3c; margin: 7.5px; }
        .ring-3 { width: 30px; height: 30px; border-bottom-color: #2ecc71; margin: 15px; }

        /* Animations */
        @keyframes dna-rotate {
            0% { transform: rotateX(0deg); }
            100% { transform: rotateX(360deg); }
        }

        @keyframes dna-wave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(20px); }
        }

        @keyframes infinity {
            0% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse-ring {
            0% { 
                width: 100%;
                height: 100%;
                opacity: 1;
            }
            100% { 
                width: 200%;
                height: 200%;
                opacity: 0;
            }
        }

        @keyframes galaxy-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        /* Staggered Blocks */
.blocks-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 4px;
    width: 60px;
    height: 60px;
}

.block {
    background-color: #3498db;
    animation: block-fade 1.5s ease-in-out infinite;
}

.block:nth-child(1) { animation-delay: 0.2s; }
.block:nth-child(2) { animation-delay: 0.4s; }
.block:nth-child(3) { animation-delay: 0.6s; }
.block:nth-child(4) { animation-delay: 0.8s; }
.block:nth-child(5) { animation-delay: 1.0s; }
.block:nth-child(6) { animation-delay: 1.2s; }
.block:nth-child(7) { animation-delay: 1.4s; }
.block:nth-child(8) { animation-delay: 1.6s; }
.block:nth-child(9) { animation-delay: 1.8s; }

/* Morphing Circle */
.morph {
    width: 50px;
    height: 50px;
    background: #3498db;
    animation: morph 2s infinite;
}

/* Liquid Fill */
.liquid-container {
    width: 50px;
    height: 50px;
    border: 3px solid #3498db;
    position: relative;
    overflow: hidden;
}

.liquid {
    position: absolute;
    width: 200%;
    height: 200%;
    top: 0;
    left: -50%;
    background: #3498db;
    animation: liquid-fill 2s ease infinite;
}

/* Neon Pulse */
.neon {
    width: 50px;
    height: 50px;
    border: 3px solid #3498db;
    animation: neon-pulse 1.5s ease-in-out infinite;
    position: relative;
}

.neon::before,
.neon::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border: 3px solid #3498db;
    animation: neon-glow 1.5s ease-in-out infinite;
}

/* Animations */
@keyframes block-fade {
    0%, 100% { opacity: 0.3; transform: scale(0.8); }
    50% { opacity: 1; transform: scale(1); }
}

@keyframes morph {
    0%, 100% { border-radius: 50%; transform: rotate(0deg); }
    25% { border-radius: 0; transform: rotate(90deg); }
    50% { border-radius: 50% 0 50% 0; transform: rotate(180deg); }
    75% { border-radius: 0 50% 0 50%; transform: rotate(270deg); }
}

@keyframes liquid-fill {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes neon-pulse {
    0%, 100% { box-shadow: 0 0 5px #3498db; }
    50% { box-shadow: 0 0 20px #3498db; }
}

@keyframes neon-glow {
    0% { transform: scale(1); opacity: 0.5; }
    100% { transform: scale(1.5); opacity: 0; }
}

/* Geometric Morph */
.geometric {
    width: 50px;
    height: 50px;
    position: relative;
    animation: geometric-morph 3s infinite;
    background: #3498db;
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
}

/* Rainbow Spinner */
.rainbow-spin {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    position: relative;
    background: conic-gradient(
        #ff0000, #ff7f00, #ffff00,
        #00ff00, #0000ff, #4b0082,
        #8f00ff, #ff0000
    );
    animation: rainbow-rotate 2s linear infinite;
}

.rainbow-spin::after {
    content: '';
    position: absolute;
    inset: 5px;
    border-radius: 50%;
    background: white;
}

/* Quantum Dots */
.quantum-container {
    width: 60px;
    height: 60px;
    position: relative;
}

.quantum-dot {
    position: absolute;
    width: 10px;
    height: 10px;
    background: #3498db;
    border-radius: 50%;
    animation: quantum-dance 2s infinite;
}

.quantum-dot:nth-child(2) { animation-delay: 0.4s; background: #e74c3c; }
.quantum-dot:nth-child(3) { animation-delay: 0.8s; background: #2ecc71; }
.quantum-dot:nth-child(4) { animation-delay: 1.2s; background: #f1c40f; }

/* Energy Field */
.energy-field {
    width: 60px;
    height: 60px;
    position: relative;
    overflow: hidden;
}

.energy-ring {
    position: absolute;
    border: 2px solid transparent;
    border-top-color: #3498db;
    border-radius: 50%;
    animation: energy-pulse 2s cubic-bezier(0.1, 0.7, 1.0, 0.1) infinite;
}

.ring1 { width: 100%; height: 100%; }
.ring2 { width: 80%; height: 80%; margin: 10%; animation-delay: 0.3s; }
.ring3 { width: 60%; height: 60%; margin: 20%; animation-delay: 0.6s; }

/* Animations */
@keyframes geometric-morph {
    0%, 100% { clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%); }
    25% { clip-path: polygon(50% 0%, 100% 100%, 50% 100%, 0% 0%); }
    50% { clip-path: circle(50% at 50% 50%); }
    75% { clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%); }
}

@keyframes rainbow-rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes quantum-dance {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 1;
    }
    25% { 
        transform: translate(25px, 25px) scale(1.2);
        opacity: 0.8;
    }
    50% { 
        transform: translate(50px, 0) scale(1);
        opacity: 1;
    }
    75% { 
        transform: translate(25px, -25px) scale(0.8);
        opacity: 0.8;
    }
}

@keyframes energy-pulse {
    0% { 
        transform: rotate(0deg) scale(0.8);
        opacity: 1;
    }
    50% { 
        transform: rotate(180deg) scale(1.2);
        opacity: 0.5;
    }
    100% { 
        transform: rotate(360deg) scale(0.8);
        opacity: 1;
    }
}
</style>

  <!-- Navbar -->
  <div id="loadingAnimation" class="loading-overlay">
    <div class="rotating-square"></div>
  </div>
  </div>
  
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
    document.addEventListener('DOMContentLoaded', function () {
    const loadingAnimation = document.getElementById('loadingAnimation');

    // Sembunyikan animasi loading saat halaman dimuat (termasuk saat "back" atau "forward")
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            // Halaman dimuat dari cache
            loadingAnimation.style.display = 'none';
        }
    });

    // Sembunyikan animasi loading ketika halaman selesai dimuat
    loadingAnimation.style.display = 'none';

    // Tambahkan event listener ke semua tautan dan tombol
    document.querySelectorAll('a, button').forEach((element) => {
        element.addEventListener('click', function (event) {
            const href = this.getAttribute('href');

            // Tampilkan animasi hanya jika tautan valid
            if (href && href !== '#' && !href.startsWith('javascript')) {
                event.preventDefault(); // Hindari langsung navigasi
                loadingAnimation.style.display = 'flex';

                // Redirect ke halaman tujuan setelah animasi
                setTimeout(() => {
                    window.location.href = href;
                }, 1400);
            }
        });
    });

    // Tambahkan event listener ke form untuk menampilkan animasi saat submit
    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', function () {
            loadingAnimation.style.display = 'flex';
        });
    });
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


