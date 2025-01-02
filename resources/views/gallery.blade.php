<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        .container a {
            text-decoration: none;
            color: #1e40af;
        }

        .action {
            margin-bottom: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .action a {
            font-weight: 600;
            text-decoration: none;
            color: #1d4ed8;
            display: flex;
            align-items: center;
            
            border-radius: 8px;
            transition: all 0.3s ease;
           
        }

        .action a:hover {
           
            transform: translateX(-2px);
        }

        .action i {
            margin-right: 10px;
        }

        .gallery-title {
            color: #1e40af;
            font-size: 2.25rem;
            text-align: center;
            margin-bottom: 2.5rem;
            font-weight: 600;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .destination-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .destination-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .card-image-wrapper {
            position: relative;
            padding-top: 75%;
            overflow: hidden;
        }

        .card-image-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .destination-card:hover img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-title {
            color: #1e40af;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-location {
            color: #6b7280;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-location::before {
            content: '📍';
        }

        @media (max-width: 768px) {
            .destinations-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="gallery-title">Pilih Destinasi Anda</h2>

        <div class="action">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        
        <div class="destinations-grid">
            <!-- Bromo -->
            <div class="destination-card">
                <a href="{{ url('/bromo') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/gambar bromo.jpeg') }}" alt="Bromo">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Bromo</h5>
                        <p class="card-location">Jawa Timur</p>
                    </div>
                </a>
            </div>

            <!-- Sindoro -->
            <div class="destination-card">
                <a href="{{ url('/sindoro') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/gunung-sindoro.jpeg') }}" alt="Gunung Sindoro">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Gunung Sindoro</h5>
                        <p class="card-location">Jawa Tengah</p>
                    </div>
                </a>
            </div>

            <!-- Ijen -->
            <div class="destination-card">
                <a href="{{ url('/kawah') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/kawah ijen.webp') }}" alt="Kawah Ijen">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Kawah Ijen</h5>
                        <p class="card-location">Jawa Timur</p>
                    </div>
                </a>
            </div>

            <!-- Karimunjawa -->
            <div class="destination-card">
                <a href="{{ url('/karimun') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/karimun jawa.webp') }}" alt="Karimun Jawa">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Karimun Jawa</h5>
                        <p class="card-location">Jawa Tengah</p>
                    </div>
                </a>
            </div>

            <!-- Pangandaran -->
            <div class="destination-card">
                <a href="{{ url('/pangandaran') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/PANGANDARAN.webp') }}" alt="Pangandaran">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Pangandaran</h5>
                        <p class="card-location">Jawa Barat</p>
                    </div>
                </a>
            </div>

            <!-- Anyer -->
            <div class="destination-card">
                <a href="{{ url('/anyer') }}">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/anyer.jpg') }}" alt="Pantai Anyer">
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Anyer</h5>
                        <p class="card-location">Banten</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>