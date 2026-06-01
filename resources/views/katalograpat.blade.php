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
                <a href="/rapat" class="active">Manajemen Rapat</a>
                <a href="/event">Katalog Event</a>
            </div>
            @if(Auth::check())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                @csrf
            <div class="user-menu" onclick="document.getElementById('logout-form').submit();">
                <i class="fa-regular fa-user"></i>
                <span>{{ Auth::user()->username }}</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            </form>
            @endif
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert-success-custom">
                <div class="alert-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="alert-message">
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
                <div class="alert-close" onclick="this.parentElement.style.display='none';">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        @endif
        <div class="catalog-header">
            <h1 class="catalog-title" style="text-transform: none;">Agenda Rapat</h1>
            <div class="catalog-tools">
                <div class="search-wrapper">
                    <form action="{{ url('/rapat') }}" method="GET"
                        style="display: flex; width: 100%; align-items: center;">
                        <i class="fa-solid fa-search" style="margin-right: 10px; color: #64748b;"></i>

                        {{-- UPDATE: Tambahkan atribut name="search" dan ambil value lama jika ada --}}
                        <input type="text" name="search" id="search-meeting" class="search-input"
                            placeholder="Cari rapat lalu tekan Enter..." value="{{ request('search') }}">
                    </form>
                </div>
                @if(Auth::user()->role === 'koordinator')
                    <a href="{{ url('/rapat/buatRapat') }}" class="btn-create" id="btn-create-rapat"
                        style="text-decoration: none;">
                        <i class="fa-solid fa-plus"></i> Buat rapat baru
                    </a>
                @endif
            </div>
        </div>

        <div class="meeting-list-container" id="meeting-list-box">

            @forelse($semua_rapat as $index => $item)
                <div class="meeting-card">
                    <div class="meeting-info-side">
                        <div class="meeting-header-title">
                            <h2 class="meeting-title">{{ $item->judul }}</h2>
                            @if(\Carbon\Carbon::parse($item->tgl_mulai)->isPast() && !\Carbon\Carbon::parse($item->tgl_mulai)->isToday())
                                {{-- State: Sudah Lewat Hari Rapat (Selesai) --}}
                                <span class="badge-status"
                                    style="background-color: #ef4444; color: white; border: 1px solid #dc2626;">
                                    Selesai
                                </span>
                            @else
                                {{-- State: Hari Ini atau Hari Mendatang (Akan Datang) --}}
                                <span class="badge-status">
                                    Akan Datang
                                </span>
                            @endif
                        </div>
                        <div class="meeting-details-grid">
                            <div class="detail-block">
                                <label>Tanggal Rapat</label>
                                <p>{{ $item->tgl_mulai}}</p>
                            </div>
                            <div class="detail-block">
                                <label>Lokasi</label>
                                <p>{{ $item->location }}</p>
                            </div>
                            <div class="detail-block">
                                <label>Penyelenggara</label>
                                <p>{{ $item->penanggung_jawab }}</p>
                            </div>
                            <div class="detail-block">
                                <label>Peserta</label>
                                {{-- Menghitung total jumlah user yang terdaftar di tabel pivot rapat_fungsionaris --}}
                                <p>{{ $item->undanganAnggota->count() }} Orang</p>
                            </div>
                        </div>


                        <div class="meeting-participants-section">
                            <h3 class="participants-title">Daftar Anggota / Peserta Rapat:</h3>
                            <ul class="participants-list">
                                @forelse($item->undanganAnggota as $anggota)
                                    <li>{{ $anggota->username }} ({{ ucfirst($anggota->role) }})</li>
                                @empty
                                    <li>Belum ada anggota yang diundang ke rapat ini.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="meeting-visual-side">
                        {{-- Menggunakan rumus sisa bagi ($index % 4) + 1 agar warna gradient background placeholder
                        berputar otomatis (bg-gradient-1 sampai 4) --}}
                        <div class="meeting-img-placeholder bg-gradient-{{ ($index % 4) + 1 }}"></div>
                        <a href="#" class="btn-meeting-detail toggle-details">Lihat detail...</a>
                    </div>
                </div>
            @empty
                {{-- Kondisi jika data rapat kosong di database Laragon --}}
                <div class="meeting-card" style="justify-content: center; padding: 40px; text-align: center;">
                    <div class="text-muted">
                        <i class="fa-solid fa-calendar-xmark"
                            style="font-size: 48px; margin-bottom: 15px; color: #cbd5e1;"></i>
                        <h5>Belum ada agenda rapat internal yang terdaftar.</h5>
                    </div>
                </div>
            @endforelse

            @if ($semua_rapat->hasPages())
                <div class="pagination-wrapper">

                    {{-- Tombol Previous (Panah Kiri) --}}
                    @if ($semua_rapat->onFirstPage())
                        {{-- Jika di halaman pertama, tombol disabled/tidak bisa diklik --}}
                        <span class="page-link-custom disabled" style="opacity: 0.5; cursor: not-allowed;">
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $semua_rapat->previousPageUrl() }}" class="page-link-custom">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    @endif


                    {{-- Loop Angka Halaman Dinamis --}}
                    @foreach (range(1, $semua_rapat->lastPage()) as $page)
                        @if ($page == $semua_rapat->currentPage())
                            {{-- Jika angka halaman sama dengan halaman aktif saat ini --}}
                            <a href="#" class="page-link-custom active">{{ $page }}</a>
                        @else
                            {{-- Jika halaman lain, berikan link url dinamis --}}
                            <a href="{{ $semua_rapat->url($page) }}" class="page-link-custom">{{ $page }}</a>
                        @endif
                    @endforeach


                    {{-- Tombol Next (Panah Kanan) --}}
                    @if ($semua_rapat->hasMorePages())
                        <a href="{{ $semua_rapat->nextPageUrl() }}" class="page-link-custom">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @else
                        {{-- Jika sudah di halaman terakhir, panah kanan disabled --}}
                        <span class="page-link-custom disabled" style="opacity: 0.5; cursor: not-allowed;">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                    @endif

                </div>
            @endif

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

        // --- FITUR TOGGLE DETAIL / MINIMIZE ---
        const toggleButtons = document.querySelectorAll('.toggle-details');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function (e) {
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