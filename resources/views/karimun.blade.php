@extends('layouts.app')

@section('title', 'Karimun jawa')  

@section('content')

<link rel="stylesheet" href="{{ asset('css/StyleeDes.css') }}">

<section class="hero">
    <video src="{{ asset('images/Video karimun jawa.mp4') }}" autoplay muted loop playsinline></video>
    <div class="container text-center">
        <h1 class="hero-title">Karimunjawa</h1>
        <p class="hero-description lead">Temukan keajaiban Pantai Karimun Jawa, pantai dengan sejuta pesona alam yang memukau.</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="content py-5">
    <div class="container">
        <h2 class="text-center">Karimunjawa, Surga Tropis di Laut Jawa</h2>
        <p class="text-center">Rasakan pesona alam yang luar biasa dan keindahan bawah laut di Karimunjawa, destinasi wisata tropis yang tak terlupakan.</p>
    </div>
</section>

<!-- Attractions Section -->
<section class="attractions py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Daya Tarik Pantai Karimunjawa</h2>
        
        <!-- First Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6">
                <img src="{{ asset('images/kekayaankarimun.jpg') }}" class="img-fluid rounded" alt="Pemandangan Gunung Krakatau">
            </div>
            <div class="col-md-6">
                <h4>Kekayaan Bawah Laut yang Menakjubkanr</h4>
                <p>Pulau-pulau di sekitar Karimun Jawa, seperti Menjangan Kecil, adalah surga bagi para penyelam dengan dinding-dinding terumbu karang vertikal yang menakjubkan dan populasi ikan yang melimpah. Pemandangan bawah laut yang memukau ini membuat Karimun Jawa menjadi destinasi impian bagi mereka yang ingin merasakan kehidupan bawah laut yang berwarna-warni dan penuh keajaiban.</p>
            </div>
        </div>

        <!-- Second Attraction -->
        <div class="row align-items-center mb-5 scroll-animation">
            <div class="col-md-6 order-md-2">
              <img src="{{ asset('images/KulinerKarimun.jpg') }}" class="img-fluid rounded" alt="Pasir Putih dan Air Jernih">
            </div>
            <div class="col-md-6 order-md-1">
                <h4>Kuliner dengan Makanan Laut Segar</h4>
                <p>Karimun Jawa memiliki kejutan lezat dengan hidangan-hidangan laut segar. Ikan bakar menjadi pilihan utama, di mana ikan segar dipanggang dengan rempah-rempah khas, menciptakan cita rasa yang tak terlupakan. Kuliner dengan Makanan Laut Segar Karimunjawa Tidak hanya ikan, berbagai hidangan laut lainnya seperti kepiting, udang, dan kerang juga bisa dinikmati dengan cita rasa autentik dan segar.</p>
            </div>
        </div>

        <!-- Third Attraction -->
        <div class="row align-items-center scroll-animation">
            <div class="col-md-6">
              <video src="{{ asset('images/terumbukarang.mp4') }}" class="img-fluid rounded" autoplay muted loop></video>
            </div>
            <div class="col-md-6">
                <h4>Terumbu Karang yang Mempesona</h4>
                <p>Terumbu karang Karimun Jawa adalah seperti galeri seni alami di bawah laut, menampilkan formasi dan warna yang luar biasa. Terumbu karang ini tidak hanya indah secara visual, tetapi juga berperan penting dalam menjaga ekosistem laut yang seimbang.</p>
            </div>
        </div>
    </div>
</section>


<!-- Bagian Kegiatan -->
<section class="activities py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Kegiatan Seru di Karimunjawa</h2>
        <div class="row g-4">
            <!-- Kegiatan berjemur -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/BerenangHiu.jpg') }}" class="img-fluid activity-img" alt="berjemur">
                    <h4 class="mt-3">Berenang Bersama Hiu</h4>
                    <p>Cocok Bagi kamu yang suka menantang adrenaline! Di pulau ini terdapat penangkaran hiu, di mana kamu bisa berenang bersama hiu-hiu kecil di sana.</p>
                    <br>
                </div>
            </div>

            <!-- Kegiatan Snorkeling -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/nemo.jpg') }}" class="img-fluid activity-img" alt="Snorkeling">
                    <h4 class="mt-3">Bertemu Nemo</h4>
                    <p>Apakah kamu tahu film “Finding Nemo”? Ikan dengan corak oranye dan hitam ini begitu ikonik di film tersebut. Jika kamu ingin melihat ikan nemo secara langsung, kamu bisa mengunjungi Pulau Seruni.</p>
                </div>
            </div>

            <!-- Kegiatan Menikmati Sunset -->
            <div class="col-md-4 scroll-animation">
                <div class="activity-card">
                    <img src="{{ asset('images/sunsetKarimun.jpg') }}" class="img-fluid activity-img" alt="jetski">
                    <h4 class="mt-3">Menikmati Sunset</h4>
                    <p>Suasana sekitar pantai yang rindang karena ditumbuhi banyaknya pohon kelapa dan ombak yang tenang membuat Pantai di Karimunjawa menjadi spot terbaik untuk healing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BUTTON --}}
@if (Auth::check())
    <button class="pesan-sekarang-btn" onclick="window.location.href='{{ route('pemesanan.show', 3) }}';">
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