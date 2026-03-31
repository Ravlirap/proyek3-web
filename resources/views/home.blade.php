@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center" style="min-height: 80vh;">
            <div class="col-lg-6" data-aos="fade-up" style="padding-top: 40px;">
                <div class="hero-text-content">
                    <h1>
                        Hitung Kalori, <br>
                        <span>Wujudkan Hidup Sehat!</span>
                    </h1>

                    <p class="lead">
                        GoHealth membantu Anda menghitung kebutuhan kalori harian, memantau asupan makanan, dan mencapai target berat badan ideal dengan mudah dan cepat.
                    </p>

                    <div>
                        <a href="#download" class="btn btn-primary-custom">
                            <i class="fas fa-download me-2"></i>Download Sekarang
                        </a>
                        <a href="#calculator" class="btn btn-outline-custom">
                            <i class="fas fa-calculator me-2"></i>Coba Kalkulator
                        </a>
                    </div>

                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="fas fa-check-circle text-success me-1"></i> Gratis selamanya &nbsp;
                            <i class="fas fa-check-circle text-success me-1"></i> Tanpa iklan &nbsp;
                            <i class="fas fa-check-circle text-success me-1"></i> 1M+ pengguna
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center" data-aos="fade-left" style="padding-top: 40px;">
                <div class="animated-food-icon">
                    <i class="fas fa-apple-alt"></i>
                    <i class="fas fa-carrot"></i>
                    <i class="fas fa-heartbeat"></i>
                    <i class="fas fa-leaf"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fitur <span>Unggulan</span> GoHealth</h2>
            <p>Berbagai fitur canggih untuk mendukung perjalanan kesehatan Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3>Scan AI Makanan</h3>
                    <p>Scan barcode atau ambil foto makanan untuk mendapatkan informasi kalori dan nutrisi secara otomatis.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3>Estimasi Kalori Otomatis</h3>
                    <p>Gunakan teknologi AI untuk memperkirakan kalori dalam makanan yang Anda konsumsi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Tracking Nutrisi Harian</h3>
                    <p>Pantau perkembangan berat badan dan asupan kalori harian Anda dengan grafik interaktif yang mudah dipahami.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3>Riwayat Konsumsi</h3>
                    <p>Lihat riwayat makanan dan minuman yang telah Anda catat sebelumnya.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Statistik Harian</h3>
                    <p>Lihat analisis dan statistik konsumsi nutrisi harian Anda dalam bentuk grafik yang mudah dipahami.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="how-it-works">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Bagaimana <span>Cara Kerjanya?</span></h2>
            <p>Mudah digunakan, hanya 4 langkah sederhana</p>
        </div>
        <div class="row">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h4>Download Aplikasi</h4>
                    <p>Unduh GoHealth di Google Play Store atau App Store secara gratis</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h4>Ambil Foto Makanan</h4>
                    <p>Ambil foto makanan yang Anda konsumsi untuk mendapatkan informasi kalori dan nutrisi secara otomatis</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h4>AI mendeteksi</h4>
                    <p>AI akan secara otomatis mendeteksi makanan dalam foto yang Anda ambil dan memberikan informasi kalori serta nutrisi.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h4>Sistem Menghitung Nutrisi</h4>
                    <p>Sistem akan menghitung total kalori dan nutrisi berdasarkan makanan yang telah dideteksi.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="500">
                <div class="step-card">
                    <div class="step-number">5</div>
                    <h4>Data Tersimpan di Dashboard</h4>
                    <p>Data konsumsi nutrisi Anda akan tersimpan di dashboard untuk dianalisis lebih lanjut.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calorie Calculator Section -->
<section id="calculator" class="calculator-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Coba <span>Kalkulator Kalori</span></h2>
            <p>Hitung kebutuhan kalori harian Anda secara gratis!</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="calculator-card">
                    <form id="calorieForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" required>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Usia (tahun)</label>
                                <input type="number" class="form-control" id="age" required placeholder="Contoh: 25">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Berat Badan (kg)</label>
                                <input type="number" class="form-control" id="weight" required placeholder="Contoh: 65">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" class="form-control" id="height" required placeholder="Contoh: 170">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Level Aktivitas</label>
                                <select class="form-select" id="activity">
                                    <option value="1.2">Sedentary (sedikit olahraga atau tidak sama sekali)</option>
                                    <option value="1.375">Light (olahraga 1-3 hari/minggu)</option>
                                    <option value="1.55">Moderate (olahraga 3-5 hari/minggu)</option>
                                    <option value="1.725">Active (olahraga 6-7 hari/minggu)</option>
                                    <option value="1.9">Very Active (olahraga berat setiap hari)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary-custom w-100" onclick="calculateCalorie()">
                                    <i class="fas fa-calculator me-2"></i>Hitung Kalori
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div id="result" class="mt-4" style="display: none;">
                        <div class="result-card">
                            <h4 class="text-white">Kebutuhan Kalori Harian Anda</h4>
                            <div class="calorie-value text-white" id="calorieResult">0</div>
                            <p class="mb-0 text-white">kkal per hari</p>
                            <small class="text-white-50">*Hasil ini adalah estimasi kebutuhan kalori untuk mempertahankan berat badan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Apa Kata <span>Pengguna</span> GoHealth?</h2>
            <p>Lebih dari 1 juta pengguna telah merasakan manfaatnya</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User" class="testimonial-avatar">
                    <div class="testimonial-name">John Doe</div>
                    <div class="testimonial-position">Pengguna GoHealth</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-message">
                        "Aplikasi ini sangat membantu saya dalam menurunkan berat badan. Dalam 3 bulan, saya berhasil turun 10 kg! Sangat recommended!"
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="User" class="testimonial-avatar">
                    <div class="testimonial-name">Sarah Rahma</div>
                    <div class="testimonial-position">Fitness Enthusiast</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-message">
                        "Suka banget sama fitur database makanannya lengkap banget! Sangat membantu mengatur diet harian saya."
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="User" class="testimonial-avatar">
                    <div class="testimonial-name">Budi A.</div>
                    <div class="testimonial-position">Atlet Profesional</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-message">
                        "Sangat direkomendasikan untuk yang ingin menjaga asupan kalori. User friendly, akurat, dan fiturnya lengkap!"
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number">1M+</div>
                    <div class="stat-label">Pengguna Aktif</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Database Makanan</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number">4.8</div>
                    <div class="stat-label">Rating Aplikasi</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Penghargaan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download Section -->
<section id="download" class="download-section">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <h2 class="text-white">Siap Memulai Hidup Sehat?</h2>
                <p class="lead text-white mb-4">Download GoHealth sekarang dan mulai hitung kalori dengan mudah!</p>
                <div class="download-buttons">
                    <a href="{{ route('download.android') }}" class="download-btn">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                    </a>
                    <a href="{{ route('download.ios') }}" class="download-btn">
                        <img src="https://developer.apple.com/app-store/marketing/guidelines/images/badge-download-on-the-app-store.svg" alt="App Store" style="height: 60px;">
                    </a>
                </div>
                <p class="mt-4 text-white-50">
                    <i class="fas fa-mobile-alt me-2"></i> Tersedia untuk Android dan iOS
                </p>
                <div class="mt-3">
                    <small class="text-white-50">
                        <i class="fas fa-shield-alt me-1"></i> Keamanan data terjamin &nbsp;
                        <i class="fas fa-wifi me-1"></i> Bisa digunakan offline
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Animasi ikon berputar dan bergerak */
.animated-food-icon {
    position: relative;
    width: 300px;
    height: 300px;
    margin: 0 auto;
    animation: containerFloat 4s ease-in-out infinite;
}

.animated-food-icon i {
    position: absolute;
    font-size: 4rem;
    color: #145A43;
    filter: drop-shadow(0 0 15px rgba(20, 90, 67, 0.5));
    animation: rotateIcon 12s linear infinite;
}

.animated-food-icon i:nth-child(1) {
    top: 20%;
    left: 20%;
    animation-delay: 0s;
}

.animated-food-icon i:nth-child(2) {
    top: 60%;
    left: 15%;
    animation-delay: 2s;
}

.animated-food-icon i:nth-child(3) {
    top: 30%;
    right: 20%;
    animation-delay: 4s;
}

.animated-food-icon i:nth-child(4) {
    bottom: 20%;
    right: 25%;
    animation-delay: 6s;
}

@keyframes rotateIcon {
    0% {
        transform: rotate(0deg) scale(1);
        opacity: 0.8;
    }
    50% {
        transform: rotate(180deg) scale(1.2);
        opacity: 1;
    }
    100% {
        transform: rotate(360deg) scale(1);
        opacity: 0.8;
    }
}

@keyframes containerFloat {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Background hero dengan gradien yang lebih menarik */
.hero {
    background: radial-gradient(circle at 10% 20%, rgba(20, 90, 67, 0.15), #000000 80%),
                linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
}
</style>

<script>
function calculateCalorie() {
    const gender = document.getElementById('gender').value;
    const age = parseInt(document.getElementById('age').value);
    const weight = parseFloat(document.getElementById('weight').value);
    const height = parseFloat(document.getElementById('height').value);
    const activity = parseFloat(document.getElementById('activity').value);
    
    if (!age || !weight || !height) {
        alert('Mohon isi semua data!');
        return;
    }
    
    let bmr;
    if (gender === 'male') {
        bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
    } else {
        bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
    }
    
    const tdee = bmr * activity;
    
    document.getElementById('calorieResult').innerHTML = Math.round(tdee);
    document.getElementById('result').style.display = 'block';
    
    // Scroll to result
    document.getElementById('result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
</script>
@endsection