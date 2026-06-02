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
                    <a href="/dashboard">Dashboard</a>
                    <a href="/rapat">Manajemen Rapat</a>
                    <a href="/event">Katalog Event</a>
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
                    <span class="highlight">DE-CO</span> Platform Manajemen Digital Dewan Perwakilan Mahasiswa & Pusat
                    Agenda Kampus
                </h1>
                <div class="hero-actions">
                    <button class="btn-join" onclick="window.location.href='/register'">Join for free</button>
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
                        <strong>{{ App\Models\User::count() }}</strong>
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
                            <strong>Let's get started!</strong>
                            <span>{{ now()->setTimezone('Asia/Jakarta')->format('g:i:s A') }}</span>
                        </div>
                    </div>
                    <button class="btn-join" onclick="window.location.href='/register'" style="padding: 15px 40px;">Join
                        Now</button>
                </div>
            </div>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
            <p class="section-label">All-In-One</p>
            <h2 class="section-h2">Satu platform untuk berbagai kebutuhan fungsionaris dewan perwakilan mahasiswa.</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <div>
                        <img class="card-img" src="{{ asset('images/Digitalize.jpg') }}" style="width: 100%;height: 200px;object-fit: cover;object-position: center;">
                    </div>
                    <h3>Legislative Meeting Management</h3>
                    <p>Penyusunan jadwal rapat komisi, pencatatan penanggung jawab, hingga dokumentasi hasil notulensi
                        terpusat.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div>
                        <img class="card-img" src="{{ asset('images/Calender.jpg') }}" style="width: 100%;height: 200px;object-fit: cover;object-position: center;">
                    </div>
                    <h3>Integrated Event Catalog</h3>
                    <p>Publikasi agenda kerja DPM, manajemen timeline kegiatan interaktif, beserta unggahan materi
                        dokumen pendukung.</p>
                    </div>
                    
                <div class="feature-card">
                    <div>
                        <img class="card-img" src="{{ asset('images/Form.jpg') }}" style="width: 100%;height: 200px;object-fit: cover;object-position: center;">
                    </div>
                    <h3>Smart Registration System</h3>
                    <p>Fasilitas daftar instan untuk internal staff fungsionaris DPM dan form biodata ketat
                        terverifikasi NIM bagi masyarakat umum.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container section-padding">
        <div class="content-split">
            <div class="content-text">
                <h2 class="section-h2">What is <span style="color: var(--primary-teal);">De-Co?</span></h2>
                <p style="line-height: 1.6; color: #475569;">De-Co (Dewan Connect) adalah platform integrasi digital
                    yang dirancang untuk memperkuat tata kelola Dewan Perwakilan Mahasiswa. Kami menghubungkan efisiensi
                    manajemen legislatif internal dengan keterbukaan informasi publik bagi seluruh mahasiswa.</p> <a
                    href="/event"
                    style="color: var(--primary-teal); font-weight: 600; text-decoration: underline;">Jelajahi Katalog
                    Event</a>
            </div>
            <div>
                <div style="height: 300px;">
                    <img class="card-img" src="{{ asset('images/Secure.jpg') }}" alt="What is De-Co?" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                </div>
            </div>
        </div>
    </section>

    <section class="container section-padding">
        <h2 class="section-h2" style="text-align: left;">Sistem Administrasi & Informasi</h2>
        <div class="news-container">
            <div class="news-main">
                <div style="height: 350px; margin-bottom: 20px;">
                    <img class="card-img" src="{{ asset('images/Stand.jpg') }}" alt="Meeting Management" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                </div>
                <h3>Optimalisasi Transparansi Notulensi Rakat Paripurna DPM</h3>
                <p>Kini fungsionaris komisi dapat menyinkronkan daftar hadir peserta rapat secara transparan menembus
                    tabel relasi server-side Laragon.</p> <a href="/rapat"
                    style="color: var(--primary-teal); font-weight: 600; text-decoration: underline;">Jelajahi Katalog
                    Rapat</a>
            </div>
            <div class="news-list">
                <div class="news-item">
                    <div style="width: 120px; height: 80px;">
                        <img class="card-img" src="{{ asset('images/Calender.jpg') }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                    </div>
                    <div>
                        <h4 style="font-size: 14px;">Fitur Baru: Integrasi Timelines</h4>
                        <p style="font-size: 12px; opacity: 0.7;">Update terbaru untuk memudahkan penjadwalan kegiatan.
                        </p>
                    </div>
                </div>
                <div class="news-item">
                    <div style="width: 120px; height: 80px;">
                        <img class="card-img" src="{{ asset('images/Form.jpg') }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                    </div>
                    <div>
                        <h4 style="font-size: 14px;">Pembaruan Instan Galeri Media</h4>
                        <p style="font-size: 12px; opacity: 0.7;">Koordinator kini dapat mengunggah file dokumentasi.</p>
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