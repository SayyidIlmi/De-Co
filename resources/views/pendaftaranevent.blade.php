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
                <a href="/event" class="active">Katalog Event</a>
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
            @else
                <div class="user-menu">
                    <i class="fa-regular fa-user"></i>
                    <span>guest</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            @endif
        </div>
    </nav>

    <div class="container">
        <div class="reg-wrapper">

            <a href="/event" class="back-link">
                <i class="fa-solid fa-chevron-left"></i> Kembali ke detail
            </a>

            <div class="reg-container">
                <div class="reg-info-sidebar">
                    <p
                        style="text-transform: uppercase; letter-spacing: 2px; font-size: 12px; margin-bottom: 10px; opacity: 0.8;">
                        Pendaftaran Peserta</p>
                    <h2>{{ $event->judul }}</h2>

                    <ul class="reg-event-meta">
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-calendar-day"></i>
                            @if($event->timelines->isNotEmpty())
                                <span>{{ \Carbon\Carbon::parse($event->timelines->first()->tanggal_event)->translatedFormat('d F Y') }}</span>
                            @else
                                <span>Tanggal belum ditentukan</span>
                            @endif
                        </li>
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{$event->location}}</span>
                        </li>
                        <li class="reg-meta-item">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>{{$event->penanggung_jawab}} (Penanggung Jawab )</span>
                        </li>
                    </ul>
                </div>

                <div class="reg-form-content">
                    <div class="reg-form-header">
                        <h3>Lengkapi Data Diri</h3>
                        <p>Pastikan data yang Anda masukkan sudah benar untuk keperluan sertifikat.</p>
                    </div>
                    @if ($errors->any())
                        <div
                            style="background-color: #fef2f2; border: 1px solid #ef4444; padding: 15px; border-radius: 6px; margin-bottom: 20px; color: #b91c1c;">
                            <strong>⚠️ Validasi Gagal Berhasil Dipost:</strong>
                            <ul style="margin: 5px 0 0 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="form-daftar-event">
                        @csrf
                        <div class="reg-form-grid">
                            <div class="form-group reg-full-width">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="input-custom"
                                    placeholder="Masukkan nama lengkap Anda..." required>
                            </div>

                            <div class="form-group">
                                <label>Nomor Induk Mahasiswa (NIM)</label>
                                <input type="text" name="nim" class="input-custom" placeholder="Contoh: 201011400..."
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Fakultas / Jurusan</label>
                                <input type="text" name="fakultas_jurusan" class="input-custom"
                                    placeholder="Teknik Informatika..." required>
                            </div>

                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="input-custom"
                                    placeholder="email@mahasiswa.ac.id" required>
                            </div>

                            <div class="form-group">
                                <label>Nomor WhatsApp</label>
                                <input type="text" name="no_wa" class="input-custom" placeholder="0812xxxx..." required>
                            </div>

                            <div class="form-group reg-full-width">
                                <label>Alasan Mengikuti Event (Opsional)</label>
                                <textarea name="alasan_mengikuti" class="input-custom"
                                    style="border-radius: 20px; height: 100px; resize: none;"
                                    placeholder="Tuliskan alasan singkat Anda..."></textarea>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: flex-end;">
                            <button type="submit" onclick="daftarEvent({{ $event->id }})" class="reg-btn-submit">Daftar
                                Sekarang</button>
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
    <script>
        function daftarEvent(eventId) {
            document.getElementById('form-daftar-event').addEventListener('submit', function (e) {
                e.preventDefault(); // Cegah browser me-refresh halaman otomatis

                const formData = new FormData(this);
                formData.append('event_id', eventId);
                // Kirim data ke fungsi daftarEvent di Controller kamu secara background
                fetch("{{ url('/event/daftar/{id}') }}".replace('{id}', eventId), { // Sesuaikan dengan endpoint rute API kamu
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert("✨ " + data.message);
                            window.location.href = "{{ url('/event') }}"; // Redirect ke katalog jika sukses
                        } else {
                            // Menampilkan pesan error validasi duplikasi NIM atau kegagalan sistem
                            alert("⚠️ " + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("Terjadi kesalahan sistem saat memproses pendaftaran.");
                    });
            });
        }
    </script>
</body>

</html>