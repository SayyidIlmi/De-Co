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
        <a href="/event" class="back-link">
            <i class="fa-solid fa-chevron-left"></i> Katalog event
        </a>

        <div class="detail-top-layout">
            <div class="event-banner-placeholder"></div>
            
            <div class="profile-card">
                <h3>Profil Penyelenggara</h3>
                <div class="profile-info">
                    <div class="profile-avatar"></div>
                    <div class="profile-meta">
                        <h4>Komisi X - <span style="font-weight:400; color:var(--text-muted);">{Nama Lembaga}</span></h4>
                        <p>Ketua - <span style="font-weight:600; color:#111827;">{Nama Ketua}</span></p>
                    </div>
                </div>
                <div class="profile-details">
                    <div class="detail-item">
                        <label>Penanggung Jawab</label>
                        <span>[Nama Penanggung Jawab]</span>
                    </div>
                    <div class="detail-item">
                        <label>Nama Penyelenggara</label>
                        <span>[Nama penyelenggara]</span>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="detail-main-title">Detail Event: Seminar Latihan Kepemimpinan dasar</h1>

        <div class="detail-grid-layout">
            
            <div class="left-column-group">
                <div class="info-box">
                    <h3>Terkait seminar ini</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                
                <div class="info-box timeline-box">
                    <h3>Timeline acara</h3>
                    <div class="timeline-wrapper">
                        <div class="timeline-node active">
                            <div class="timeline-dot"></div>
                            <label>17 April</label>
                            <span>Pendaftaran</span>
                        </div>
                        <div class="timeline-node active">
                            <div class="timeline-dot"></div>
                            <label>18 April</label>
                            <span>Pertemuan 1</span>
                        </div>
                        <div class="timeline-node active">
                            <div class="timeline-dot"></div>
                            <label>19 April</label>
                            <span>Pertemuan 2</span>
                        </div>
                        <div class="timeline-node">
                            <div class="timeline-dot"></div>
                            <label>16 April</label>
                            <span>Pertemuan 3</span>
                        </div>
                        <div class="timeline-node">
                            <div class="timeline-dot"></div>
                            <label>27 April</label>
                            <span>Penutupan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-box">
                <h3>Dokumen Terkait</h3>
                <div class="doc-list">
                    <div class="doc-item" style="background-color:#eaeaea; height:40px; cursor:default;"></div>
                    <div class="doc-item"><i class="fa-regular fa-file-lines"></i></div>
                    <div class="doc-item"><i class="fa-regular fa-file-lines"></i></div>
                    <div class="doc-item"><i class="fa-regular fa-file-lines"></i></div>
                    <div class="doc-item"><i class="fa-regular fa-file-lines"></i></div>
                </div>
            </div>

            <div class="info-box">
                <h3>Galeri Media</h3>
                <div class="gallery-grid">
                    <div class="gallery-item" style="background-color:#eaeaea;"></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                    <div class="gallery-item"><i class="fa-regular fa-image"></i></div>
                </div>
            </div>

        </div>

        <div class="question-section">
            <h3>Ajukan pertanyaan</h3>
            <div class="input-question-wrapper">
                <i class="fa-regular fa-comment-dots"></i>
                <input type="text" class="input-question" placeholder="tulis pertanyaanmu...">
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