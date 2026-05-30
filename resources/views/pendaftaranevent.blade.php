<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Dewan Connect</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: #f4f7f6;">

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
        <div class="reg-wrapper">
            
            <a href="/detailevent/id" class="back-link">
                <i class="fa-solid fa-chevron-left"></i> Kembali ke detail
            </a>

            <div class="reg-container">
                <div class="reg-info-sidebar">
                    <p style="text-transform: uppercase; letter-spacing: 2px; font-size: 12px; margin-bottom: 10px; opacity: 0.8;">Pendaftaran Peserta</p>
                    <h2>Seminar Latihan Kepemimpinan Dasar</h2>
                    
                    <ul class="reg-event-meta">
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-calendar-day"></i>
                            <span>Senin, 18 Mei 2026</span>
                        </li>
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-clock"></i>
                            <span>08:00 - 15:00 WIB</span>
                        </li>
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Aula Gedung C, Lantai 3</span>
                        </li>
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Komisi X DPM</span>
                        </li>
                    </ul>
                </div>

                <div class="reg-form-content">
                    <div class="reg-form-header">
                        <h3>Lengkapi Data Diri</h3>
                        <p>Pastikan data yang Anda masukkan sudah benar untuk keperluan sertifikat.</p>
                    </div>

                    <form action="#" method="POST">
                        @csrf
                        <div class="reg-form-grid">
                            <div class="form-group reg-full-width">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="input-custom" placeholder="Masukkan nama lengkap Anda..." required>
                            </div>

                            <div class="form-group">
                                <label>Nomor Induk Mahasiswa (NIM)</label>
                                <input type="text" name="nim" class="input-custom" placeholder="Contoh: 201011400..." required>
                            </div>

                            <div class="form-group">
                                <label>Fakultas / Jurusan</label>
                                <input type="text" name="major" class="input-custom" placeholder="Teknik Informatika..." required>
                            </div>

                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="input-custom" placeholder="email@mahasiswa.ac.id" required>
                            </div>

                            <div class="form-group">
                                <label>Nomor WhatsApp</label>
                                <input type="text" name="phone" class="input-custom" placeholder="0812xxxx..." required>
                            </div>

                            <div class="form-group reg-full-width">
                                <label>Alasan Mengikuti Event (Opsional)</label>
                                <textarea name="reason" class="input-custom" style="border-radius: 20px; height: 100px; resize: none;" placeholder="Tuliskan alasan singkat Anda..."></textarea>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: flex-end;">
                            <button type="submit" class="reg-btn-submit">Daftar Sekarang</button>
                        </div>
                    </form>
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