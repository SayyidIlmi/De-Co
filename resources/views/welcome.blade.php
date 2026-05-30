<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Dewan Connect</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header class="hero-section">
        <div class="hero-wave">
            <img src="{{ asset('images/wave-bottom.png') }}" alt="Wave Background">
        </div> 

        <nav class="navbar">
        <div class="container nav-flex">
            <a class="logo" style="text-decoration: none;">De-Co</a>
            <div class="nav-links">
                <a>Dashboard</a>
                <a>Manajemen Rapat</a>
                <a>Katalog Event</a>
            </div>
            <div class="auth-buttons">
                    <a href="/login"><button class="btn-login">Login</button></a>
                    <a href="/register"><button class="btn-signup">Sign Up</button></a>
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
            <div class="f-text">
                <strong>250k</strong>
                <span>Assisted Student</span>
            </div>
        </div>
        
        <div class="f-card card-mid">
            <div class="f-icon bg-orange"><i class="far fa-envelope"></i></div>
            <div class="f-text">
                <strong>Congratulations</strong>
                <span>Your admission completed</span>
            </div>
        </div>
        
        <div class="f-card card-bottom">
            <div class="user-info">
                <div class="user-avatar"></div>
                <div class="f-text">
                    <strong>User Experience Class</strong>
                    <span>Today at 12.00 PM</span>
                </div>
            </div>
            <button class="btn-join-now">Join Now</button>
        </div>
    </div>
</div>
    </header>

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
                    <div class="angular-box"></div>
                    <h3>Scheduling & Attendance</h3>
                    <p>Sistem penjadwalan rapat dan absensi digital yang terintegrasi langsung.</p>
                </div>
                
                <div class="feature-card">
                    <div class="angular-box"></div>
                    <h3>Customer Tracking</h3>
                    <p>Pantau keterlibatan mahasiswa dalam setiap agenda dan program kerja.</p>
                </div>
            </div>
        </div>
    </section>

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

    <section class="container section-padding">
        <h2 class="section-h2" style="text-align: left;">Latest News and Resources</h2>
        <div class="news-container">
            <div class="news-main">
                <div class="angular-box" style="height: 350px; margin-bottom: 20px;"></div>
                <h3>Cara Mengoptimalkan Manajemen Rapat Organisasi di Era Digital</h3>
                <p>Pelajari langkah-langkah praktis dalam mengelola administrasi legislatif agar lebih efisien.</p>
                <a href="#"style="color: var(--primary-teal); font-weight: 600; text-decoration: underline;" >Read more</a>
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

    <footer class="footer">
        <div class="container footer-flex">
            <div class="footer-brand">
                <div class="footer-logo">De-Co</div>
                <div class="footer-sub">Dewan Connect</div>
                <p>platform integrasi digital yang dirancang untuk memperkuat tata kelola Dewan Perwakilan Mahasiswa.
                    Kami menghubungkan efisiensi manajemen legislatif dengan keterbukaan informasi publik, menciptakan
                    satu ruang terpusat untuk administrasi rapat yang rapi dan katalog kegiatan organisasi yang
                    informatif.</p>
            </div>
            <div class="footer-contact">
                <div class="contact-title">Contact us</div>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 De-Co Technologies inc.
        </div>
    </footer>

</body>
</html>