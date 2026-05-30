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
 
    <div class="container">
         
        <div class="catalog-header">
            <h1 class="catalog-title" style="text-transform: none;">Agenda Rapat</h1>
            <div class="catalog-tools">
                <div class="search-wrapper">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" id="search-meeting" class="search-input" placeholder="Cari rapat...">
                </div>
                <div class="filter-wrapper">
                    <i class="fa-solid fa-calendar-days"></i>
                    <select class="filter-select">
                        <option>Akan datang</option>
                    </select>
                </div>
                <a href="{{ url('/rapat/buatRapat') }}" class="btn-create" id="btn-create-rapat" style="text-decoration: none;">
                    <i class="fa-solid fa-plus"></i> Buat rapat baru
                </a>
            </div>
        </div>
 
        <div class="meeting-list-container" id="meeting-list-box">
             
            <div class="meeting-card">
                <div class="meeting-info-side">
                    <div class="meeting-header-title">
                        <h2 class="meeting-title">Rapat Koordinasi Tim</h2>
                        <span class="badge-status">Akan Datang</span>
                    </div>
                    <div class="meeting-details-grid">
                        <div class="detail-block">
                            <label>Tanggal & Waktu</label>
                            <p>5 Mei 2026 - 9.00</p>
                        </div>
                        <div class="detail-block">
                            <label>Lokasi</label>
                            <p>Ruang Meeting A</p>
                        </div>
                        <div class="detail-block">
                            <label>Penyelenggara</label>
                            <p>Ahmad Hidayat</p>
                        </div>
                        <div class="detail-block">
                            <label>Peserta</label>
                            <p>4 Orang</p>
                        </div>
                    </div>
                    <div class="detail-block meeting-agenda-block">
                        <label>Agenda</label>
                        <p>Pembahasan roadmap Q2 dan koordinasi proyek prioritas</p>
                    </div>

                    <div class="meeting-participants-section">
                        <h3 class="participants-title">Daftar Anggota / Peserta Rapat:</h3>
                        <ul class="participants-list">
                            <li>Ahmad Hidayat (Ketua)</li>
                            <li>Peserta 2</li>
                            <li>Peserta 3</li>
                            <li>Peserta 4</li>
                        </ul>
                    </div>
                </div>
                <div class="meeting-visual-side">
                    <div class="meeting-img-placeholder bg-gradient-1"></div>
                    <a href="#" class="btn-meeting-detail toggle-details">Lihat detail...</a>
                </div>
            </div>
 
            <div class="meeting-card">
                <div class="meeting-info-side">
                    <div class="meeting-header-title">
                        <h2 class="meeting-title">Evaluasi Bulanan</h2>
                        <span class="badge-status">Akan Datang</span>
                    </div>
                    <div class="meeting-details-grid">
                        <div class="detail-block">
                            <label>Tanggal & Waktu</label>
                            <p>10 Mei 2026 - 14.00</p>
                        </div>
                        <div class="detail-block">
                            <label>Lokasi</label>
                            <p>Virtual Meeting</p>
                        </div>
                        <div class="detail-block">
                            <label>Penyelenggara</label>
                            <p>Siti Nurhaliza</p>
                        </div>
                        <div class="detail-block">
                            <label>Peserta</label>
                            <p>3 Orang</p>
                        </div>
                    </div>
                    <div class="detail-block meeting-agenda-block">
                        <label>Agenda</label>
                        <p>Pembahasan mengenai standarisasi pelaporan anggaran internal organisasi</p>
                    </div>

                    <div class="meeting-participants-section">
                        <h3 class="participants-title">Daftar Anggota / Peserta Rapat:</h3>
                        <ul class="participants-list">
                            <li>Siti Nurhaliza (Penyelenggara)</li>
                            <li>Peserta B</li>
                            <li>Peserta C</li>
                        </ul>
                    </div>
                </div>
                <div class="meeting-visual-side">
                    <div class="meeting-img-placeholder bg-gradient-2"></div>
                    <a href="#" class="btn-meeting-detail toggle-details">Lihat detail...</a>
                </div>
            </div>
 
            <div class="meeting-card">
                <div class="meeting-info-side">
                    <div class="meeting-header-title">
                        <h2 class="meeting-title">Rapat Koordinasi Tim Kerja</h2>
                        <span class="badge-status">Akan Datang</span>
                    </div>
                    <div class="meeting-details-grid">
                        <div class="detail-block">
                            <label>Tanggal & Waktu</label>
                            <p>5 Mei 2026 - 9.00</p>
                        </div>
                        <div class="detail-block">
                            <label>Lokasi</label>
                            <p>Ruang Meeting A</p>
                        </div>
                        <div class="detail-block">
                            <label>Penyelenggara</label>
                            <p>Ahmad Hidayat</p>
                        </div>
                        <div class="detail-block">
                            <label>Peserta</label>
                            <p>18 Orang</p>
                        </div>
                    </div>
                    <div class="detail-block meeting-agenda-block">
                        <label>Agenda</label>
                        <p>Pembahasan kesiapan infrastruktur pelaporan legislatif tingkat universitas</p>
                    </div>
 
                    <div class="meeting-participants-section">
                        <h3 class="participants-title">Peserta dibawah ini diharap untuk menghadiri rapat !</h3>
                        <ul class="participants-list">
                            <li>Peserta 1</li><li>Peserta 11</li><li>Peserta 2</li><li>Peserta 12</li>
                            <li>Peserta 3</li><li>Peserta 13</li><li>Peserta 4</li><li>Peserta 14</li>
                            <li>Peserta 5</li><li>Peserta 15</li><li>Peserta 6</li><li>Peserta 16</li>
                            <li>Peserta 7</li><li>Peserta 17</li><li>Peserta 8</li><li>Peserta 18</li>
                            <li>Peserta 9</li><li>Peserta 10</li>
                        </ul>
                    </div>
                </div>
                <div class="meeting-visual-side">
                    <div class="meeting-img-placeholder bg-gradient-4"></div>
                    <a href="#" class="btn-meeting-detail toggle-details">Lihat detail...</a>
                </div>
            </div>
 
            <div class="pagination-wrapper">
                <a href="#" class="page-link-custom"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="page-link-custom active">1</a>
                <a href="#" class="page-link-custom">2</a>
                <a href="#" class="page-link-custom">3</a>
                <a href="#" class="page-link-custom">4</a>
                <a href="#" class="page-link-custom">5</a>
                <a href="#" class="page-link-custom"><i class="fa-solid fa-chevron-right"></i></a>
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
 
    <script>
        // --- FITUR SEARCH ---
        document.getElementById('search-meeting').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            const meetingCards = document.querySelectorAll('.meeting-card');
 
            meetingCards.forEach(card => {
                const titleElement = card.querySelector('.meeting-title');
                const agendaElement = card.querySelector('.meeting-agenda-block p');
 
                const titleText = titleElement ? titleElement.textContent.toLowerCase() : '';
                const agendaText = agendaElement ? agendaElement.textContent.toLowerCase() : '';
 
                if (titleText.includes(keyword) || agendaText.includes(keyword)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // --- FITUR TOGGLE DETAIL / MINIMIZE ---
        const toggleButtons = document.querySelectorAll('.toggle-details');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah link '#' melompat ke atas halaman
                
                // Cari elemen .meeting-card terdekat dari tombol yang diklik
                const card = this.closest('.meeting-card');
                
                // Toggle class 'expanded' pada kartu rapat
                card.classList.toggle('expanded');
                
                // Ubah teks dan ikon tombol berdasarkan state kartu
                if (card.classList.contains('expanded')) {
                    this.innerHTML = '<i class="fa-solid fa-compress"></i> Minimize';
                    this.style.color = '#e5e7eb';
                    this.style.backgroundColor = '#136a6a'; // Ganti warna background tombol saat aktif
                } else {
                    this.innerHTML = 'Lihat detail...';
                    this.style.color = ''; // Mengembalikan ke style bawaan css
                    this.style.backgroundColor = ''; 
                }
            });
        });
    </script>
</body>
</html>