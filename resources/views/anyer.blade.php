@extends('layouts.app')

@section('title', 'Anyer')

@section('content')

<link rel="stylesheet" href="{{ asset('css/StyleeDes.css') }}">

<section class="hero">
    <video src="{{ asset('images/video anyer.mp4') }}" autoplay muted loop playsinline></video>
    <div class="container text-center">
        <h1 class="hero-title">Anyer</h1>
        <p class="hero-description lead">Temukan keajaiban Pantai Anyer, pantai dengan sejuta pesona budaya dan alam yang memukau.</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="content py-5">
    <div class="container">
        <h2 class="text-center">Anyer, Kota Pantai yang Menawan</h2>
        <p class="text-center">Rasakan pesona budaya yang kaya dan pemandangan alam yang luar biasa di Anyer, salah satu destinasi pantai terbaik di Indonesia.</p>
    </div>
</section>

<!-- Attractions Section -->
<section class="attractions py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Daya Tarik Anyer</h2>
        
        <!-- First Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6">
                <img src="{{ asset('images/Gunung Anyer.jpg') }}" class="img-fluid rounded" alt="Pemandangan Gunung Krakatau">
            </div>
            <div class="col-md-6">
                <h4>Pemandangan Gunung Krakatau</h4>
                <p>Salah satu daya tarik utama Pantai Anyer adalah pemandangan Gunung Krakatau, gunung berapi terkenal yang terletak di Selat Sunda. Meskipun letusan besar Krakatau terjadi pada 1883, gunung ini masih aktif dan sering menjadi objek wisata menarik. Pengunjung dapat menikmati pemandangan gunung berapi yang megah dan menakjubkan dari Pantai Anyer.</p>
            </div>
        </div>

        <!-- Second Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6 order-md-2">
              <img src="{{ asset('images/Pasir putih anyer.jpg') }}" class="img-fluid rounded" alt="Pasir Putih dan Air Jernih">
            </div>
            <div class="col-md-6 order-md-1">
                <h4>Pasir Putih dan Air Jernih</h4>
                <p>Pantai Anyer terkenal dengan hamparan pasir putih yang lembut dan air laut yang jernih . Hal ini menjadikannya tempat yang ideal untuk bersantai, bermain pasir, dan berenang. Pemandangan yang indah juga menambah daya tarik pantai ini, terutama saat matahari terbenam.</p>
            </div>
        </div>

        <!-- Third Attraction -->
        <div class="row align-items-center scroll-animation">
            <div class="col-md-6">
              <video src="{{ asset('images/Titiknol.mp4') }}" class="img-fluid rounded" autoplay muted loop></video>
            </div>
            <div class="col-md-6">
                <h4>Sejarah dan Budaya</h4>
                <p> Anyer memiliki nilai sejarah yang kaya, termasuk Monumen Titik Nol Kilometer Anyer-Panarukan dan mercusuar bersejarah. Pengunjung dapat belajar tentang sejarah daerah ini sambil menikmati keindahan alamnya, menjadikannya pengalaman yang tidak hanya menyenangkan tetapi juga mendidik.</p>
            </div>
        </div>
    </div>
</section>


<!-- Bagian Kegiatan -->
<section class="activities py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Kegiatan Seru di Pantai Anyer</h2>
        <div class="row g-4">
            <!-- Kegiatan berjemur -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/jemur.jpg') }}" class="img-fluid activity-img" alt="berjemur">
                    <h4 class="mt-3">Berjemur dan Piknik di Pantai</h4>
                    <p>Pasir putih yang bersih dan pemandangan laut yang luas membuatnya menjadi tempat yang ideal untuk bersantai, membaca buku, atau bermain voli pantai.</p>
                    <br>
                </div>
            </div>

            <!-- Kegiatan Snorkeling -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/Snorkling Pangandaran.jpg') }}" class="img-fluid activity-img" alt="Snorkeling">
                    <h4 class="mt-3">Snorkeling</h4>
                    <p>Menjelajahi kehidupan bawah laut sekitar Pantai Anyer. Beberapa spot snorkeling dan diving menawarkan pemandangan terumbu karang yang masih alami, serta berbagai jenis ikan tropis.</p>
                </div>
            </div>

            <!-- Kegiatan Menikmati Sunset -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/jetski.jpg') }}" class="img-fluid activity-img" alt="jetski">
                    <h4 class="mt-3">Bermain Jetski</h4>
                    <p>Pantai Anyer juga menyediakan kegiatan jetski. Kamu bisa menjelajahi laut lepas dengan kecepatan tinggi. Kamu bisa merasakan adrenalin saat meluncur di atas air.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BUTTON --}}
@if (Auth::check())
    <button class="pesan-sekarang-btn" onclick="window.location.href='{{ route('pemesanan.show', 2) }}';">
        Pesan Sekarang
    </button>
@else
    <button class="login-sekarang-btn" onclick="window.location.href='{{ route('login') }}';">
        Login untuk Memesan
    </button>
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    let timeout;
    const navbar = document.querySelector('.navbar');
    const pesanButton = document.querySelector('.pesan-sekarang-btn');
  
    // Fungsi untuk menyembunyikan navbar dan tombol pesan setelah beberapa detik tidak ada aktivitas
    function hideElements() {
        navbar.classList.add('hidden');  // Menambahkan kelas untuk menyembunyikan navbar
        pesanButton.classList.add('hidden');  // Menambahkan kelas untuk menyembunyikan tombol pesan
    }
  
    // Fungsi untuk menampilkan navbar dan tombol pesan ketika ada aktivitas
    function showElements() {
        navbar.classList.remove('hidden');  // Menghapus kelas untuk menampilkan navbar
        pesanButton.classList.remove('hidden');  // Menghapus kelas untuk menampilkan tombol pesan
        clearTimeout(timeout);  // Menghentikan timer hideElements
        timeout = setTimeout(hideElements, 3000);  // Mengatur untuk menyembunyikan navbar dan tombol pesan setelah 3 detik tidak ada aktivitas
    }
  
    // Deteksi scroll atau pergerakan mouse untuk navbar dan tombol pesan
    window.addEventListener('scroll', showElements);  // Menampilkan navbar dan tombol pesan saat scroll
    window.addEventListener('mousemove', showElements);  // Menampilkan navbar dan tombol pesan saat ada pergerakan mouse
  
    // Menyembunyikan navbar dan tombol pesan saat halaman pertama kali dimuat
    timeout = setTimeout(hideElements, 3000);  // Navbar dan tombol pesan akan tersembunyi setelah 3 detik pertama

    window.addEventListener('scroll', () => {
        const elements = document.querySelectorAll('.scroll-animation');
        elements.forEach((element) => {
            const position = element.getBoundingClientRect();
            if (position.top < window.innerHeight && position.bottom >= 0) {
                element.classList.add('animate');
            }
        });
    });
    $(document).ready(function() {
    // Efek fade in untuk konten saat halaman dimuat
    $('.content, .attractions, .activities').hide().fadeIn(1500);

    // Animasi scroll smooth untuk navigasi
    $('.navbar-nav a').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });

    // Efek hover pada kartu aktivitas
    $('.activity-card').hover(
        function() {
            $(this).addClass('shadow-lg scale-up');
        },
        function() {
            $(this).removeClass('shadow-lg scale-up');
        }
    );

    // Animasi scroll reveal yang lebih halus
    $(window).scroll(function() {
        $('.scroll-animation').each(function() {
            var elementTop = $(this).offset().top;
            var windowTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (windowTop > elementTop - windowHeight + 100) {
                $(this).addClass('animate');
            }
        });
    });

    // Tooltip Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
  </script>

@endsection