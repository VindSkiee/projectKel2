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
