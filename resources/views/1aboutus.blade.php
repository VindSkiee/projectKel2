<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Java Wonderland</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <style>
        /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
        line-height: 1.6;
    }

    h1, h2, h3, h4 {
        font-family: 'Poppins', sans-serif;
    }

    .containerImg {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }



    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                    url('https://images.unsplash.com/photo-1583417319070-4a69db38a482?ixlib=rb-4.0.3') center/cover no-repeat;
        color: white;
        text-align: center;
        padding: 100px 15px;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 700;
    }

    .hero-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .hero-section a {
        text-decoration: none;
        color: white;
        border: 2px solid white;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .hero-section a:hover {
        background-color: white;
        color: black;
    }

    /* About Section */
    #about {
        background-color: #fff;
        padding: 50px 0;
    }

    #about img {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #about h2 {
        font-size: 2rem;
        color: #007bff;
        margin-bottom: 20px;
    }

    /* Mission Section */
    .mission-section {
        background-color: #f1f1f1;
        padding: 50px 0;
    }

    .mission-section .card {
        transition: transform 0.3s ease;
    }

    .mission-section .card:hover {
        transform: translateY(-10px);
    }

    .mission-section i {
        color: #007bff;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        padding: 40px 0;
    }

    .team-member {
        text-align: center;
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .team-member:hover {
        transform: translateY(-5px);
    }

    .team-member img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .team-member h3 {
        color: #2563eb;
        margin: 10px 0;
    }

    .team-member p {
        color: #666;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .team-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .team-member img {
            width: 150px;
            height: 150px;
        }
    }


    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
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

    <div class="team-grid">
        <div class="team-member">
            <img src="{{ asset('images/Yosua.jpg') }}" alt="Team Member 1">
            <h3>Yosua</h3>
            <p>CEO & Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/Lina.jpg') }}" alt="Team Member 1">
            <h3>Lina</h3>
            <p>CEO & Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/athal.jpg') }}" alt="Team Member 1">
            <h3>Athal</h3>
            <p>CEO & Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/arvind.jpg') }}" alt="Team Member 1">
            <h3>Arvind</h3>
            <p>CEO & Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/gevin.jpg') }}" alt="Team Member 1">
            <h3>Gevin</h3>
            <p>CEO & Founder</p>
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // Initialize AOS
    AOS.init({
        duration: 1200,
        easing: "ease-in-out",
        once: true,
    });

    // Smooth Scrolling for Learn More Button
    const scrollToAbout = document.querySelector("a[href='#about']");
    scrollToAbout.addEventListener("click", function (e) {
        e.preventDefault();
        const aboutSection = document.querySelector("#about");
        aboutSection.scrollIntoView({ behavior: "smooth" });
    });

    // Hover Animations for Team Images
    const teamImages = document.querySelectorAll(".team-member img");
    teamImages.forEach((img) => {
        img.addEventListener("mouseenter", () => {
            img.style.transform = "scale(1.1)";
            img.style.transition = "transform 0.3s ease";
        });

        img.addEventListener("mouseleave", () => {
            img.style.transform = "scale(1)";
        });
    });
});

    </script>
</body>

</html>
