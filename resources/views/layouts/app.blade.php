<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GoHealth - @yield('title', 'Hitung Kalori, Hidup Sehat')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #40c297;
            /* --primary: #000000; */
            --primary-dark: #059669;
            --primary-light: #34d399;
            --dark: #000000;
            --dark-gray: #111111;
            --medium-gray: #1a1a1a;
            --light-gray: #2a2a2a;
            --white: #ffffff;
            --off-white: #f5f5f5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at left, #145C43, #021D16);
            color: var(--white);
            overflow-x: hidden;
            position: relative;
        }
        
        /* Efek background tambahan - bersih tanpa kotak */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 80% 70%, rgba(20, 90, 67, 0.05), transparent 60%),
                        radial-gradient(circle at 20% 80%, rgba(20, 90, 67, 0.03), transparent 50%);
            pointer-events: none;
            z-index: 0;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--dark-gray);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
        
        /* Navbar */
        .navbar {
            background: radial-gradient(circle at left, #145C43, #021D16);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(20, 90, 67, 0.25);
            transition: all 0.3s ease;
            padding: 0.75rem 0;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary) !important;
            text-decoration: none;
            line-height: 1;
            margin: 0;
        }

        .navbar-brand img {
            width: 44px;
            height: 44px;
            object-fit: contain;
            display: block;
            flex-shrink: 0;
            filter: drop-shadow(0 0 12px rgba(20, 90, 67, 0.5));
        }

        .navbar-brand span {
            display: inline-block;
            font-size: 1.7rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1;
            color: var(--primary);
        }
        
        .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: radial-gradient(circle at left, #145C43, #021D16);
            position: relative;
            overflow: hidden;
            padding: 120px 0 80px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero h1 span {
            color: var(--primary);
            position: relative;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--off-white);
            margin-bottom: 30px;
            line-height: 1.6;
        }
        /* Perbaikan teks di hero section */
.hero .btn-primary-custom,
.hero .btn-outline-custom {
    position: relative;
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 2;
}

/* Jika teks masih kurang kontras, tambahkan efek shadow */
.hero h1,
.hero p {
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

/* Alternatif: buat background card yang lebih solid untuk kalkulator */
.hero .btn-primary-custom {
    background: var(--primary);
    color: white;
    font-weight: bold;
}

/* Tambahan efek glow untuk teks hero */
.hero h1 span {
    text-shadow: 0 0 15px rgba(20, 90, 67, 0.8);
}
        .btn-primary-custom {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 10px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }
        
        .btn-primary-custom:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(20, 90, 67, 0.4);
            color: var(--white);
        }
        
        .btn-outline-custom {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--primary);
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 10px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }
        
        .btn-outline-custom:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(20, 90, 67, 0.3);
        }
        
        .hero-food-right {
            width: 100%;
            max-width: 400px;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }
        
        .hero-food-right:hover {
            transform: scale(1.02);
        }
        
        /* Features Section */
        .features {
            padding: 100px 0;
            background: linear-gradient(180deg, #0a0a0a 0%, #0f0f0f 100%);
            position: relative;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--white);
        }
        
        .section-title h2 span {
            color: var(--primary);
        }
        
        .section-title p {
            font-size: 1.1rem;
            color: var(--off-white);
        }
        
        .feature-card {
            background: var(--medium-gray);
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(20, 90, 67, 0.15);
            position: relative;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(20, 90, 67, 0.4);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }
        
        .feature-icon i {
            font-size: 2.5rem;
            color: var(--white);
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--white);
        }
        
        .feature-card p {
            color: #9ca3af;
            line-height: 1.6;
        }
        
        /* How It Works */
        .how-it-works {
            padding: 100px 0;
            background: linear-gradient(0deg, #050505 0%, #0a0a0a 100%);
        }
        
        .step-card {
            text-align: center;
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        .step-card:hover {
            transform: translateY(-5px);
        }
        
        .step-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 25px;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px rgba(20, 90, 67, 0.4);
        }
        
        .step-card h4 {
            color: var(--white);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .step-card p {
            color: #9ca3af;
        }
        
        /* Calculator Section */
        .calculator-section {
            padding: 100px 0;
            background: radial-gradient(circle at 50% 0%, rgba(20, 90, 67, 0.08), #0a0a0a 90%);
            position: relative;
        }
        
        .calculator-card {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(5px);
            border-radius: 30px;
            padding: 40px;
            border: 1px solid rgba(20, 90, 67, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .form-label {
            color: var(--white);
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .form-control, .form-select {
            background: var(--light-gray);
            border: 1px solid rgba(20, 90, 67, 0.25);
            color: var(--white);
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background: var(--light-gray);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(20, 90, 67, 0.2);
            color: var(--white);
            outline: none;
        }
        
        .form-control::placeholder {
            color: #6b7280;
        }
        
        .result-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 20px;
            padding: 30px;
            text-align: center;
        }
        
        .calorie-value {
            font-size: 3.5rem;
            font-weight: bold;
            margin: 20px 0;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 100px 0;
            background: linear-gradient(180deg, #0f0f0f 0%, #0a0a0a 100%);
        }
        
        .testimonial-card {
            background: var(--medium-gray);
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(20, 90, 67, 0.15);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            border-color: rgba(20, 90, 67, 0.4);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        
        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid var(--primary);
        }
        
        .testimonial-name {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--white);
        }
        
        .testimonial-position {
            color: #9ca3af;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .testimonial-rating {
            color: #fbbf24;
            margin-bottom: 15px;
        }
        
        .testimonial-message {
            color: #d1d5db;
            line-height: 1.6;
            font-style: italic;
        }
        
        /* Stats Section */
        .stats {
            padding: 80px 0;
            background: linear-gradient(180deg, #0a0a0a 0%, #050505 100%);
            border-top: 1px solid rgba(20, 90, 67, 0.25);
            border-bottom: 1px solid rgba(20, 90, 67, 0.25);
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #9ca3af;
            font-size: 1rem;
        }
        
        /* Download Section */
        .download-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            position: relative;
            overflow: hidden;
        }
        
        .download-buttons {
            margin-top: 40px;
        }
        
        .download-btn {
            display: inline-block;
            margin: 10px;
            transition: all 0.3s ease;
        }
        
        .download-btn:hover {
            transform: translateY(-5px);
        }
        
        .download-btn img {
            height: 60px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(0deg, #030303 0%, #0a0a0a 100%);
            color: var(--white);
            padding: 60px 0 20px;
            border-top: 1px solid rgba(20, 90, 67, 0.2);
        }
        
        .footer h5 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: var(--primary);
        }
        
        .footer a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .footer a:hover {
            color: var(--primary);
        }
        
        .social-icons a {
            font-size: 1.5rem;
            margin-right: 15px;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #6b7280;
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            border: none;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .feature-card {
                margin-bottom: 20px;
            }
            
            .calculator-card {
                padding: 20px;
            }

            .navbar-brand {
                gap: 10px;
            }

            .navbar-brand img {
                width: 36px;
                height: 36px;
            }

            .navbar-brand span {
                font-size: 1.45rem;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="GoHealth Logo" onerror="this.src='https://via.placeholder.com/44x44?text=GH'">
                <span>GoHealth</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\'%3E%3Cpath stroke=\'%23145A43\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">Cara Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calculator">Kalkulator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">Download</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>GoHealth</h5>
                    <p>Aplikasi penghitung kalori cerdas untuk gaya hidup sehat. Mulai perjalanan kesehatan Anda hari ini!</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#how-it-works">Cara Kerja</a></li>
                        <li><a href="#calculator">Kalkulator Kalori</a></li>
                        <li><a href="#testimonials">Testimoni</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i> gohealth@gmail.com</li>
                        <li><i class="fas fa-phone me-2"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 GoHealth. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
        
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) {
                navbar.style.background = 'rgba(0, 0, 0, 0.96)';
            } else {
                navbar.style.background = 'rgba(0, 0, 0, 0.92)';
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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
    </script>
    
    @stack('scripts')
</body>
</html>