<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Dewan Connect Landing Page</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- 1. HERO SECTION -->

    <header class="hero-section">
            <div class="hero-wave">
        <img src="{{ asset('images/wave-bottom.png') }}" alt="Wave Background">
    </div> 
        <nav class="navbar">
            <div class="container nav-container">
                <div class="logo">De-Co</div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="/login"><button class="btn-login">Login</button></a>
                    <button class="btn-signup">Sign Up</button>
                </div>
            </div>
        </nav>

        <div class="container hero-wrapper">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="highlight">DE-CO</span> Platform Manajemen Digital Dewan Perwakilan Mahasiswa & Pusat Agenda Kampus
                </h1>
                <div class="hero-actions">
                    <button class="btn-join">Join for free</button>
                    <button class="btn-watch">
                        <span class="play-icon"><i class="fas fa-play"></i></span>
                        Watch how it works
                    </button>
                </div>
            </div>

            <div class="floating-elements">
                <div class="f-card card-top">
                    <div class="f-icon bg-blue"><i class="far fa-calendar"></i></div>
                    <div class="f-text"><strong>250k</strong><span> Assisted Student</span></div>
                </div>
                <div class="f-card card-mid">
                    <div class="f-icon bg-orange"><i class="far fa-envelope"></i></div>
                    <div class="f-text"><strong>Congratulations </strong><span> Your admission completed</span></div>
                </div>
                <div class="f-card card-bottom">
                    <div class="user-info">
                        <div class="user-avatar"></div>
                        <div><strong>User Experience Class</strong><span> Today at 12.00 PM</span></div>
                    </div>
                    <button class="btn-join-now">Join Now</button>
                </div>
            </div>
        </div>
 
    </header>

    <!-- 2. ALL-IN-ONE SOFTWARE SECTION -->
    <section class="section-padding">
        <div class="container">
            <p class="section-label">All-In-One Cloud Software</p>
            <h2 class="section-h2">Satu platform untuk berbagai kebutuhan digital mahasiswa.</h2>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="angular-box"></div>
                    <h3>Online Billing & Invoicing</h3>
                    <p>Kelola administrasi keuangan organisasi dengan lebih transparan dan otomatis.</p>
                </div>
                <div class="feature-card">
                    <div class="angular-box" style="--color-1: #4db6ac; --color-2: #80cbc4;"></div>
                    <h3>Scheduling & Attendance</h3>
                    <p>Sistem penjadwalan rapat dan absensi digital yang terintegrasi langsung.</p>
                </div>
                <div class="feature-card">
                    <div class="angular-box" style="--color-1: #1a237e; --color-2: #7986cb;"></div>
                    <h3>Customer Tracking</h3>
                    <p>Pantau keterlibatan mahasiswa dalam setiap agenda dan program kerja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. ABOUT DE-CO SECTION (Side by Side) -->
    <section class="container section-padding">
        <div class="content-split">
            <div class="content-text">
                <h2 class="section-h2">What is <span style="color: var(--primary-teal);">De-Co?</span></h2>
                <p>De-Co adalah solusi integrasi digital yang dirancang khusus untuk mempermudah tata kelola Dewan Perwakilan Mahasiswa dalam mengelola agenda, rapat, dan informasi publik.</p>
                <a href="#" style="color: var(--primary-teal); font-weight: 600; text-decoration: underline;">Learn more</a>
            </div>
            <div class="content-img">
                <div class="angular-box" style="height: 300px;"></div>
            </div>
        </div>
    </section>

    <!-- 4. LATEST NEWS SECTION -->
    <section class="container section-padding">
        <h2 class="section-h2" style="text-align: left;">Latest News and Resources</h2>
        <div class="news-container">
            <div class="news-main">
                <div class="angular-box" style="height: 350px; margin-bottom: 20px;"></div>
                <h3>Cara Mengoptimalkan Manajemen Rapat Organisasi di Era Digital</h3>
                <p>Pelajari langkah-langkah praktis dalam mengelola administrasi legislatif agar lebih efisien.</p>
                <a href="#">Read more</a>
            </div>
            <div class="news-list">
                <div class="news-item">
                    <div class="angular-box" style="width: 120px; height: 80px;"></div>
                    <div>
                        <h4 style="font-size: 14px;">Fitur Baru: Integrasi Kalender Akademik</h4>
                        <p style="font-size: 12px; opacity: 0.7;">Update terbaru untuk memudahkan penjadwalan.</p>
                    </div>
                </div>
                <div class="news-item">
                    <div class="angular-box" style="width: 120px; height: 80px;"></div>
                    <div>
                        <h4 style="font-size: 14px;">Laporan Transparansi Dana DPM 2026</h4>
                        <p style="font-size: 12px; opacity: 0.7;">Akses publik untuk keterbukaan informasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-brand">
                    <div class="footer-logo">De-Co</div>
                    <p class="footer-desc">Menghubungkan efisiensi manajemen legislatif dengan keterbukaan informasi publik untuk mahasiswa Indonesia.</p>
                    <div class="social-links">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
                <div class="footer-links">
                    <!-- Tambahkan link menu footer jika perlu -->
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 De-Co Technologies Inc. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>