<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Java Wonderland</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/app/css/aboutus.css">
</head>
<body>
    <style>
        /* navbar */
.navbar {
    background-color: transparent !important;
    transition: box-shadow 0.3s, background-color 0.3s;
}


.navbar.expanded {
    width: 100%;
    height: auto;
    background-color: rgba(255, 255, 255, 0.95);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    padding: 1rem 2rem;
}


.navbar:hover {
    background-color: rgba(255, 255, 255, 0.2);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); 
}


.navbar .nav-link,
.navbar .navbar-brand {
    color: rgb(11, 11, 11) !important;
}


.navbar .nav-link:hover {
    color: #0040ff !important; 
}

.navbar .all-trips-menu {
    display: none;
    list-style: none;
    padding: 0;
    margin: 1rem 0 0 0;
}

.navbar.expanded .all-trips-menu {
    display: block;
}

.navbar .all-trips-menu li a {
    color: #333;
    display: block;
    padding: 0.5rem 0;
    text-decoration: none;
}

.navbar .all-trips-menu li a:hover {
    color: #ff5722;
}

.dropdown-item.active-page {
    opacity: 0.5;
    pointer-events: none; 
}

.navbar.hidden {
    transform: translateY(-100%); 
    transition: transform 0.3s ease; 
}
/* Hero */
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1496568816309-51d7c20e3b21?ixlib=rb-4.0.3') center/cover;
    height: 80vh;
    color: white;
    display: flex;
    align-items: center;
    text-align: center;
}

.mission-section {
    background-color: #f8f9fa;
    padding: 100px 0;
}
 /* tim tampilan  */
.team-member {
    text-align: center;
    margin-bottom: 30px;
}

.team-member img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
}

.team-member:hover img {
    transform: scale(1.1);
}
/* status */
.stats-section {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1542359649-31e03cd4d909?ixlib=rb-4.0.3') center/cover fixed;
    color: white;
    padding: 80px 0;
}

.stat-item {
    text-align: center;
    padding: 20px;
}

.stat-number {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Timeline */

.timeline {
    position: relative;
    padding: 50px 0;
}

.timeline-item {
    padding: 20px;
    margin-bottom: 30px;
    border-left: 3px solid #007bff;
    position: relative;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -10px;
    top: 50%;
    width: 20px;
    height: 20px;
    background: #007bff;
    border-radius: 50%;
}

/* tanggapan */
.testimonial-card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin: 20px;
}

.testimonial-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 15px;
}

/* Animated Background */
.bg-animated {
    background: linear-gradient(45deg, #1a237e, #0277bd, #00695c);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.footer a {
    color: #fff;
    text-decoration: none;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.footer a:hover {
    color: #ff5722;
}

.footer .bi {
    font-size: 1.5rem;
    margin-right: 10px;
}

.footer i {
    font-size: 1.5rem;  
    margin-right: 10px;  
}

.action {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 100;
    padding: 10px 20px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.action:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

.action a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #ffffff;
    font-weight: 600;
    font-size: 16px;
    transition: transform 0.3s ease;
}

.action a:hover {
    transform: translateX(-5px);
}

.action i {
    margin-right: 10px;
    font-size: 18px;
}

@media (max-width: 768px) {
    .action {
        top: 10px;
        left: 10px;
        padding: 8px 15px;
    }
    
    .action a {
        font-size: 14px;
    }
    
    .action i {
        font-size: 16px;
    }
}
    </style>


    <!-- Navbar -->


    <!-- Hero Section -->
    
    <section class="hero-section">
        <div class="action">
            <a href="{{ url('/') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        <div class="container" data-aos="fade-up">
            <h1 class="display-3 mb-4">Discover Java With Us</h1>
            <p class="lead mb-4">Mengeksplorasi keindahan Pulau Jawa bersama tim profesional kami</p>
            <a href="#about" class="btn btn-outline-light btn-lg">Learn More</a>
        </div>
    </section>
    

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-right">
                    <h2 class="mb-4">Tentang Java Wonderland</h2>
                    <p class="lead">Java Wonderland adalah platform travel premium yang berfokus pada eksplorasi keindahan Pulau Jawa. Kami berkomitmen untuk memberikan pengalaman perjalanan yang tak terlupakan dengan layanan terbaik.</p>
                    <p>Dengan pengalaman lebih dari 10 tahun dalam industri pariwisata, kami telah membantu ribuan wisatawan menemukan keajaiban Pulau Jawa.</p>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?ixlib=rb-4.0.3" 
                         alt="About Us" 
                         class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                            <h3>Visi</h3>
                            <p>Menjadi platform travel terdepan yang menghubungkan wisatawan dengan keindahan Pulau Jawa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                            <h3>Misi</h3>
                            <p>Memberikan pengalaman perjalanan berkualitas dengan pelayanan profesional dan harga terjangkau</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                            <h3>Nilai</h3>
                            <p>Mengutamakan kepuasan pelanggan dan keberlanjutan pariwisata lokal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Tim Kami</h2>
    
            <!-- Yosua berada di atas dan di tengah -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-4 text-center" data-aos="fade-up">
                    <div class="team-member">
                        <img src="{{ asset('images/Yosua.jpg') }}" alt="Team Member" class="img-fluid">
                        <h4>Yosua Karyadi Putra</h4>
                        <p>Founder & CEO</p>
                    </div>
                </div>
            </div>
    
            <!-- Anggota tim lainnya berada di bawah dan berjajar rapi -->
            <div class="row text-center">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <img src="{{ asset('images/Lina.jpg') }}" alt="Team Member" class="img-fluid">
                        <h4>Esterlin Imanuela Siahaya</h4>
                        <p>Head of Operations</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <img src="{{ asset('images/athal.jpg') }}" alt="Team Member" class="img-fluid">
                        <h4>Athala Angwyn Renaldi</h4>
                        <p>Lead Tour Guide</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <img src="{{ asset('images/arvind.jpg') }}" alt="Team Member" class="img-fluid">
                        <h4>Arvind Alaric</h4>
                        <p>COO</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">
                        <img src="{{ asset('images/gevin.jpg') }}" alt="Team Member" class="img-fluid">
                        <h4>Gevin Pamoza</h4>
                        <p>CFO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3" data-aos="fade-up">
                    <div class="stat-item">
                        <div class="stat-number" data-target="10000">9054</div>
                        <div>Pelanggan Puas</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-number" data-target="500">6</div>
                        <div>Destinasi</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-number" data-target="50">13</div>
                        <div>Penghargaan</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-number" data-target="10">10</div>
                        <div>Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Perjalanan Kami</h2>
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-up">
                    <h4>2013</h4>
                    <p>Java Wonderland didirikan dengan visi menjadi platform travel terbaik di Pulau Jawa.</p>
                </div>
                <div class="timeline-item" data-aos="fade-up">
                    <h4>2015</h4>
                    <p>Memperluas jangkauan ke seluruh kota besar di Pulau Jawa.</p>
                </div>
                <div class="timeline-item" data-aos="fade-up">
                    <h4>2018</h4>
                    <p>Meluncurkan aplikasi mobile untuk memudahkan pemesanan perjalanan.</p>
                </div>
                <div class="timeline-item" data-aos="fade-up">
                    <h4>2021</h4>
                    <p>Meraih penghargaan sebagai "Best Travel Platform" di Indonesia Travel Awards.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-5 bg-animated">
        <div class="container">
            <h2 class="text-center text-white mb-5" data-aos="fade-up">Apa Kata Mereka</h2>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="testimonial-card">
                        <img src="/Componen/Fotografi.jpg" alt="Testimonial" class="testimonial-image">
                        <p>"Pengalaman yang luar biasa! Tim Java Wonderland sangat profesional dan membantu."</p>
                        <h5>Zelmi</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <img src="/Componen/Api Biru.jpg" alt="Testimonial" class="testimonial-image">
                        <p>"Saya sangat merekomendasikan Java Wonderland untuk perjalanan Anda di Pulau Jawa."</p>
                        <h5>Afif</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <img src="/Componen/BerenangHiu.jpg" alt="Testimonial" class="testimonial-image">
                        <p>"Harga terjangkau dengan pelayanan kelas atas. Terima kasih Java Wonderland!"</p>
                        <h5>Bian</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
<footer class="footer bg-dark text-light py-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>Contact Us</h5>
                <p>Email: info@javawonderland.com</p>
                <p>Phone: +62 123 456 789</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Follow Us</h5>
                <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#" class="text-light"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
            <div class="col-md-4 mb-3">
                <h5>About Us</h5>
                <p>Discover the beauty of Indonesia through curated tours in breathtaking destinations.</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2024 | Java Wonderland. All Rights Reserved.</p>
        </div>
    </div>
</footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        
        // Inisialisasi AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            once: true
        });

        // Animasi Counter untuk Stats Section
        const counters = document.querySelectorAll('.stat-number');
        
        function animateCounter(counter) {
            const target = parseInt(counter.getAttribute('data-target'));
            let count = 0;
            const speed = target / 200; // Kecepatan animasi

            function updateCount() {
                if (count < target) {
                    count += speed;
                    counter.innerText = Math.ceil(count);
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            }

            updateCount();
        }

        // Intersection Observer untuk memulai animasi counter ketika tampil di viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => animateCounter(counter));
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelector('.stats-section').forEach(section => {
            observer.observe(section);
        });

        // Smooth Scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-dark', 'shadow');
            } else {
                navbar.classList.remove('bg-dark', 'shadow');
            }
        });

        // Tambahkan efek hover pada team member
        document.querySelectorAll('.team-member').forEach(member => {
            member.addEventListener('mouseover', function() {
                this.querySelector('img').style.transform = 'scale(1.1)';
            });
            member.addEventListener('mouseout', function() {
                this.querySelector('img').style.transform = 'scale(1)';
            });
        });

        // Tambahkan efek parallax pada stats section
        window.addEventListener('scroll', function() {
            const statsSection = document.querySelector('.stats-section');
            const scrolled = window.pageYOffset;
            statsSection.style.backgroundPositionY = -(scrolled * 0.5) + 'px';
        });
    </script>
</body>
</html>