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

    <nav class="navbar">
        <div class="container nav-flex">
            <a href="{{ route('dashboard') }}" class="logo" style="text-decoration: none;">De-Co</a>
            <div class="nav-links">
                <a href="/dashboard">Dashboard</a>
                <a href="/rapat">Manajemen Rapat</a>
                <a href="/event" class="active" >Katalog Event</a>
            </div>
            <div class="user-menu">
                <i class="fa-regular fa-user"></i>
                <span>Your name</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="catalog-header">
            <h1 class="catalog-title">Katalog event</h1>
            <div class="catalog-tools">
                <div class="search-wrapper">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" class="search-input" placeholder="Cari event...">
                </div>
                <div class="filter-wrapper">
                    <i class="fa-solid fa-filter"></i>
                    <select class="filter-select">
                        <option>Semua kategori...</option>
                    </select>
                </div>
                <a href="/event/create" class="btn-create" style="text-decoration: none;">
                    <i class="fa-solid fa-plus"></i> Buat event baru
                </a>
            </div>
        </div>

        <div class="event-grid">
            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-1"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>

            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-2"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>

            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-3"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>

            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-4"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>

            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-5"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>

            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-6"></div>
                <h2 class="event-card-title">Class adds $30 million to its balance sheet for a Zoom-friendly edtech
                    solution</h2>
                <p class="event-card-desc">Class, launched less than a year ago by Blackboard co-founder Michael Chasen,
                    integrates exclusively...</p>
                <div class="event-date">Senin, 18 Mei 2026</div>
                <div class="card-actions">
                    <a href="event/detail" class="btn-detail">Lihat detail...</a>
                    <a href="event/daftar" class="btn-register">Pendaftaran</a>
                </div>
            </div>
        </div>
    </div>

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