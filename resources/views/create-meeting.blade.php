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
                <a href="/rapat" class="active" >Manajemen Rapat</a>
                <a href="/event">Katalog Event</a>
            </div>
            <div class="user-menu">
                <i class="fa-regular fa-user"></i>
                <span>Your name</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <main class="container" style="padding-top: 40px;">
        
        <a href="#" class="form-header-link">
            <i class="fas fa-chevron-left"></i> Buat rapat baru
        </a>

        <div class="form-card">
            <form action="#" method="POST">
                
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="nama_rapat">Nama rapat</label>
                        <input type="text" id="nama_rapat" name="nama_rapat" class="input-custom" placeholder="Adobe XD Auto - Animate : Your Guide to Creating">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="waktu_mulai">Tanggal & waktu mulai</label>
                        <input type="text" id="waktu_mulai" name="waktu_mulai" class="input-custom" placeholder="September 24, 2017 07:59 am">
                    </div>
                    <div class="form-group">
                        <label for="waktu_berakhir">Tanggal & waktu berakhir</label>
                        <input type="text" id="waktu_berakhir" name="waktu_berakhir" class="input-custom" placeholder="September 24, 2017 07:59 am">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="lokasi">Lokasi/link virtual meeting</label>
                        <input type="text" id="lokasi" name="lokasi" class="input-custom" placeholder="2118 Thornridge Cir, Syracuse, Connecticut 35624">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="penyelenggara">Nama Penyelenggara</label>
                        <input type="text" id="penyelenggara" name="penyelenggara" class="input-custom" placeholder="Lina">
                    </div>
                    <div class="form-group">
                        <label for="agenda">Agenda</label>
                        <input type="text" id="agenda" name="agenda" class="input-custom" placeholder="Pembahasan roadmap Q2 dan koordinasi proyek prioritas">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tambah_peserta">Tambah Peserta</label>
                        <input type="text" id="tambah_peserta" name="tambah_peserta" class="input-custom" placeholder="Add People +">
                    </div>
                    <div class="form-group">
                        <label for="link_notulensi">Link dokumen notulensi</label>
                        <input type="url" id="link_notulensi" name="link_notulensi" class="input-custom" placeholder="https://docs.google.com/document/d/1BLiRjSrieNyMLyRkrTplJaj_HH8ki">
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 40px;">
                    <button type="submit" class="btn-save-now">Simpan</button>
                </div>

            </form>
        </div>
    </main>

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