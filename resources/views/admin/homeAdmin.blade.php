<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #93c5fd;
            --white: #ffffff;
        }

        body {
            background-color: #f0f5ff;
        }

        .sidebar {
            position: fixed;
            width: 250px;
            height: 100vh;
            background: var(--primary-blue);
            padding: 20px;
            color: var(--white);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .menu-item {
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-item a {
            text-decoration: none;
            color: var(--white);
        }

        .menu-item:hover {
            background: var(--secondary-blue);
        }

        .menu-item i {
            width: 20px;
        }


        
        .menu-item button {
            margin-left: 10px;
            background: none;
            border: none;
            color: var(--white);
            font-size: 16px;
            font-weight: bold;

        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .main-content a{
            text-decoration: none;
            color: #333;
        }

        .header {
            background: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .dashboard-card {
            background: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: var(--light-blue);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .card-icon i {
            font-size: 24px;
            color: var(--primary-blue);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .card-description {
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 10px;
            }

            .logo {
                display: none;
            }

            .menu-item span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }
        }

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

        .rotating-square {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #3498db, #2e33cc);
            animation: rotate-square 2s infinite;
        }

        /* Animations */
        @keyframes rotate-square {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }


    </style>
</head>
<body>
    <div id="loadingAnimation" class="loading-overlay">
        <div class="rotating-square"></div>
      </div>
    <div class="sidebar">
        <div class="logo">Admin</div>
        <div class="menu-item">
            <a href="{{ route('admin.pesanan') }}">
                <i class="fas fa-shopping-cart"></i>
            <span>Pesanan User</span>
            </a>
            
        </div>
        <div class="menu-item">
            <a href="{{ route('voucher.admin') }}">
                <i class="fas fa-ticket"></i>
                <span>Voucher</span>
            </a>
            
        </div>
        <div class="menu-item">
            <a href="{{ route('admin.edit.destinasi') }}">
                <i class="fas fa-map-marker-alt"></i>
                <span>Destinasi</span>
            </a>
            
        </div>
        <div class="menu-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                    <i class="fa-sharp-duotone fa-solid fa-arrow-left"></i>
                    <span><button class="btn">Logout</button></span>
            </form>
        </div>
        
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard Admin</h1>
        </div>

        <div class="dashboard-grid">
            <a href="{{ route('admin.pesanan') }}">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-title">Kelola Pesanan</div>
                    <div class="card-description">
                        Lihat dan kelola semua pesanan dari pengguna. Update status pesanan dan konfirmasi pembayaran.
                    </div>
                </div>
            </a>
            
            <a href="{{ route('voucher.admin') }}">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-ticket"></i>
                    </div>
                    <div class="card-title">Kelola Voucher</div>
                    <div class="card-description">
                        Buat dan kelola voucher diskon. Atur kode, jumlah, dan periode voucher.
                    </div>
                </div>
            </a>
            
            <a href="{{ route('admin.edit.destinasi') }}">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="card-title">Update Destinasi</div>
                    <div class="card-description">
                        Tambah, edit, atau hapus destinasi wisata. Update informasi dan harga paket perjalanan.
                    </div>
                </div>
            </a>
            
        </div>
    </div>
<script>
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
</body>
</html>