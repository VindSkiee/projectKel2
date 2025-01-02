@extends('layouts.app')

@section('title', 'Kawah Ijen')

@section('content')

<link rel="stylesheet" href="{{ asset('css/StyleeDes.css') }}">

<section class="hero">
    <video src="{{ asset('images/videoKawahIjen') }}" autoplay muted loop playsinline></video>
    <div class="container text-center">
        <h1 class="hero-title">Kawah Ijen</h1>
        <p class="hero-description lead">Jelajahi keindahan Kawah Ijen, fenomena alam dengan api biru dan panorama yang menakjubkan.</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="content py-5">
    <div class="container">
        <h2 class="text-center">Kawah Ijen, Fenomena Alam Langka</h2>
        <p class="text-center">Rasakan pesona dan keajaiban fenomena api biru yang hanya ada di Kawah Ijen, serta pemandangan danau belerang yang luar biasa.</p>
    </div>
</section>

<!-- Attractions Section -->
<section class="attractions py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Daya Tarik Kawah Ijen</h2>
        
        <!-- First Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6">
                <img src="{{ asset('images/Api Biru.jpg') }}" class="img-fluid rounded" alt="Pemandangan Gunung Krakatau">
            </div>
            <div class="col-md-6">
                <h4>Fenomena Api Biru</h4>
                <p>Kawah Ijen adalah salah satu dari dua tempat di dunia yang memiliki fenomena api biru, fenomena ini muncul dari pembakaran gas belerang dan hanya bisa terlihat saat malam hari.</p>
            </div>
        </div>

        <!-- Second Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6 order-md-2">
              <img src="{{ asset('images/videoKawahIjen.mp4') }}" class="img-fluid rounded" alt="Pasir Putih dan Air Jernih">
            </div>
            <div class="col-md-6 order-md-1">
                <h4>Danau Asam Sulfat</h4>
                <p>Danau di Kawah Ijen memiliki warna hijau toska yang unik karena kandungan asam sulfatnya. Pemandangan danau ini sangat mempesona dan menjadi daya tarik utama bagi para pendaki.</p>
            </div>
        </div>

        <!-- Third Attraction -->
        <div class="row align-items-center scroll-animation">
            <div class="col-md-6">
              <video src="{{ asset('images/tambang Ijen.jpg') }}" class="img-fluid rounded" autoplay muted loop></video>
            </div>
            <div class="col-md-6">
                <h4>Aktivitas Penambangan Belerang</h4>
                <p>Kawah Ijen juga terkenal dengan penambang belerangnya yang bekerja dalam kondisi sulit untuk mengambil bongkahan belerang, memberikan pengunjung pandangan tentang kehidupan keras di sekitar kawah.</p>
            </div>
        </div>
    </div>
</section>


<!-- Bagian Kegiatan -->
<section class="activities py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Kegiatan Seru di Kawah Ijen</h2>
        <div class="row g-4">
            <!-- Kegiatan berjemur -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/MendakiKawahIjen.jpg') }}" class="img-fluid activity-img" alt="berjemur">
                    <h4 class="mt-3">Mendaki di Malam Hari</h4>
                    <p>Mulai pendakian di malam hari untuk menyaksikan fenomena api biru yang hanya terlihat saat gelap.</p>
                    <br>
                </div>
            </div>

            <!-- Kegiatan Snorkeling -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/Snorkling Fotografi.jpg') }}" class="img-fluid activity-img" alt="Snorkeling">
                    <h4 class="mt-3">Fotografi</h4>
                    <p>Kawah Ijen menawarkan lanskap unik yang sempurna untuk fotografi, dari api biru hingga danau belerang yang eksotis.</p>
                </div>
            </div>

            <!-- Kegiatan Menikmati Sunset -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/Sunriseijen.jpg') }}" class="img-fluid activity-img" alt="jetski">
                    <h4 class="mt-3">Menyaksikan Sunrise</h4>
                    <p>Menikmati matahari terbit di puncak Kawah Ijen adalah pengalaman yang tak terlupakan bagi para pendaki.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BUTTON --}}
@if (Auth::check())
    <button class="pesan-sekarang-btn" onclick="window.location.href='{{ route('pemesanan.show', 6) }}';">
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