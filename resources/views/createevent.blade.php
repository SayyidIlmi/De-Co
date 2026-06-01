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
            @endif
        </div>
    </nav>

    <div class="container" style="margin-top: 40px;">

        <a href="/event" class="form-header-link">
            <i class="fa-solid fa-chevron-left"></i> Tambahkan event
        </a>
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
        <div class="form-card">
            <form action="/event" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body-wrapper" id="dynamic-form-container">
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="event_name">Nama Event</label>
                            <input type="text" name="event_name" id="event_name" class="input-custom"
                                placeholder="Ascend Leadership" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="input-custom"
                                placeholder="Deskripsi event..." required>
                        </div>
                        <div class="form-group full-width">
                            <label for="location">Lokasi</label>
                            <input type="text" name="location" id="location" class="input-custom" placeholder="GKM Lt 3"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="banner">Tambahkan gambar banner / poster</label>
                            <input type="file" name="banner" id="banner" class="input-custom">
                        </div>

                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="input-custom"
                                placeholder="Nama penanggung jawab" required>
                        </div>
                    </div>

                    <div class="form-row timeline-item">
                        <div class="form-group">
                            <label>Timeline Date</label>
                            <input type="date" name="timeline[0][tanggal_event]" class="input-custom" required>
                        </div>

                        <div class="form-group" style="position: relative;">
                            <label>Timeline Description</label>
                            <input type="text" name="timeline[0][agenda]" class="input-custom"
                                placeholder="Maks 10 karakter" required>
                        </div>
                    </div>

                </div>

                <button type="button" class="btn-add-timeline" id="btn-append-timeline">
                    <i class="fa-solid fa-plus"></i> Tambah timeline
                </button>

                <div class="form-actions">
                    <button type="submit" class="btn-save-now">Save Now</button>
                </div>
            </form>
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
        let timelineIndex = 1;
        document.getElementById('btn-append-timeline').addEventListener('click', function () {
            const container = document.getElementById('dynamic-form-container');

            // Membuat struktur baris baru menggunakan struktur kelas form-row yang sama
            const newRow = document.createElement('div');
            newRow.className = 'form-row timeline-item';
            newRow.style.animation = 'fadeInUp 0.4s ease forwards';

            newRow.innerHTML = `
                <div class="form-group">
                    <label>Timeline Date</label>
                    <input type="date" name="timeline[${timelineIndex}][tanggal_event]" class="input-custom" required>
                </div>
                <div class="form-group" style="position: relative;">
                    <label>Timeline Description</label>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="text" name="timeline[${timelineIndex}][agenda]" class="input-custom" placeholder="Deskripsi agenda..." required>
                        <button type="button" class="btn-remove-row" style="background: #ef4444; color: white; border: none; padding: 12px 15px; border-radius: 12px; cursor: pointer; transition: 0.2s;" onclick="this.closest('.timeline-item').remove();">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            `;

            container.appendChild(newRow);
            timelineIndex++;
        });
    </script>
</body>

</html>