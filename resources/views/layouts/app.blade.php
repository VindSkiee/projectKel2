<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Wonderland')</title>

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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAllTrips" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">All Trips</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAllTrips">
              <li><a class="dropdown-item active-page" href="#">Pantai Pangandaran</a></li>
              <li><a class="dropdown-item" href="{{ url('/anyer') }}">Pantai Anyer</a></li>
              <li><a class="dropdown-item" href="/Deskripsi/karimunjawa.html">Pantai Karimun Jawa</a></li>
              <li><a class="dropdown-item" href="/Deskripsi/bromo.html">Gunung Bromo</a></li>
              <li><a class="dropdown-item" href="/Deskripsi/sindoro.html">Gunung Sindoro</a></li>
              <li><a class="dropdown-item" href="/Deskripsi/ijen.html">Gunung Ijen</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="gallery.html"><i class="fas fa-images me-1"></i>Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="aboutus.html"><i class="fas fa-info-circle me-1"></i>About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="reviews.html"><i class="fas fa-comments me-1"></i>Review</a></li>
          <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-cart-shopping me-1"></i>Pesanan</a></li>
         
          <div class="notif">
            <li class="nav-item">
              <a class="nav-link" href="login.html" id="loginButton"><i class="fas fa-user me-1"></i>Login</a>
              <span class="badge"></span>
            </li>
          </div>
          

          <!-- Profile Button (Hanya akan muncul saat login) -->
          <li class="nav-item" id="profileNavItem" style="display: none;">
            <a class="nav-link" href="#" id="profileButton"><i class="fas fa-user me-1"></i>Profile</a>
          </li>
    
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Profile Sidebar -->
  <div id="profileSidebar" class="profile-sidebar">
    <button id="closeProfileSidebar" class="btn-close">&times;</button>
    <div class="profile-content">
      <div class="profile-pic-container">
        <img id="profileImage" src="/path/to/default-profile.png" alt="Profile Picture" class="profile-pic">
        <input type="file" id="uploadImage" accept="image/*" hidden>
        <label for="uploadImage" class="upload-btn">Change Picture</label>
      </div>
      <h2 id="profileName">User Name</h2>
      <p id="profileEmail">user@example.com</p>
      <button id="logoutButton">Log Out</button>
    </div>
  </div>

    <!-- Konten Utama -->
    <div class="content">
        @yield('content') <!-- Tempat untuk konten dinamis -->
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Java Wonderland. All Rights Reserved.</p>
    </footer>
</body>
</html>
