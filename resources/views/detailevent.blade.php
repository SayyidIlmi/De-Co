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
        <a href="/event" class="back-link">
            <i class="fa-solid fa-chevron-left"></i> Katalog event
        </a>

        <div class="detail-top-layout">
            <div class="event-banner-placeholder">
                @if($event->file_path)
                    <img src="{{ asset('/storage/' . $event->file_path) }}" alt="Event Banner"
                        style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
                @else
                    <div class="event-banner-placeholder"></div>
                @endif
            </div>

            <div class="profile-card">
                <h3>Profil Penyelenggara</h3>
                <div class="profile-info">
                    <div class="profile-avatar"></div>
                    <div class="profile-meta">
                        <h4>Komisi X - <span
                                style="font-weight:400; color:var(--text-muted);">{{ $event->penanggung_jawab }}</span>
                        </h4>
                    </div>
                </div>
                <div class="profile-details">
                    <div class="detail-item">
                        <label>Penanggung Jawab</label>
                        <span>{{ $event->penanggung_jawab }}</span>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="detail-main-title">Detail Event: {{ $event->judul }}</h1>

        <div class="detail-grid-layout">

            <div class="left-column-group">
                <div class="info-box">
                    <h3>Terkait seminar ini</h3>
                    <p>{{ $event->deskripsi }}</p>
                </div>

                <div class="info-box timeline-box">
                    <h3>Timeline acara</h3>
                    <div class="timeline-wrapper">
                        @forelse($event->timelines as $timeline)
                            <div class="timeline-node active">
                                <div class="timeline-dot"></div>
                                <label>{{ $timeline->tanggal_event }}</label>
                                <span>{{ $timeline->agenda }}</span>
                            </div>
                        @empty
                            <p style="color: #64748b; font-size: 16px;">Belum ada timeline yang ditambahkan untuk event ini.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="info-box">
                <h3>Dokumen Terkait</h3>
                <div class="doc-list">
                    @if(Auth::check() && Auth::user()->role === 'koordinator')
                        <a class="btn-create" onclick="document.getElementById('material-file-input').click();"
                            id="btn-create-event" style="text-decoration: none;">
                            <i class="fa-solid fa-plus"></i> Tambah Dokumen
                        </a>
                        <form id="form-upload-material" action="{{ url('/event/material/' . $event->id) }}" method="POST"
                            enctype="multipart/form-data" style="display: none;">
                            @csrf
                            <input type="file" name="material_file" id="material-file-input"
                                onchange="document.getElementById('form-upload-material').submit();">
                        </form>
                    @endif
                    @forelse($event->materials as $document)
                        <div class="doc-item"
                            onclick="window.open('{{ asset('storage/' . $document->file_path) }}', '_blank')"
                            style="cursor: pointer; display: flex; align-items: center; margin-bottom: 10px;"><i
                                class="fa-regular fa-file-lines"></i>
                            <div style="margin-left:10px; font-size: 12px;">
                                {{ $document->nama_materi }}
                            </div>
                        </div>
                    @empty
                        <div class="doc-item" style="background-color:#eaeaea; height:40px; cursor:default;"></div>
                    @endforelse
                </div>
            </div>

            <div class="info-box">
                <h3>Galeri Media</h3>
                <div class="gallery-grid">
                    @if(Auth::check() && Auth::user()->role === 'koordinator')
                        <div class="gallery-item" onclick="document.getElementById('documentation-file-input').click();"
                            style="cursor: pointer; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; min-height: 100px; border-radius: 6px; border: 2px dashed #136a6a; color: #136a6a; font-weight: 500;">
                            <div style="text-align: center;">
                                <i class="fa-solid fa-camera"
                                    style="font-size: 20px; display: block; margin-bottom: 4px;"></i>
                                <span style="font-size: 12px;">Add Image</span>
                            </div>
                        </div>

                        <form id="form-upload-documentation" action="{{ url('/event/documentation/' . $event->id) }}"
                            method="POST" enctype="multipart/form-data" style="display: none;">
                            @csrf
                            <input type="file" name="doc_photo" id="documentation-file-input" accept="image/*"
                                onchange="document.getElementById('form-upload-documentation').submit();">
                        </form>
                    @endif
                    @forelse($event->documentations as $photo)
                        <div class="gallery-item"
                            onclick="window.open('{{ asset('storage/' . $photo->image_path) }}', '_blank')"
                            style="cursor: pointer; position: relative; min-height: 100px; border-radius: 6px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Dokumentasi Event"
                                style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                        </div>
                    @empty
                        {{-- Kotak Cadangan Jika Belum Ada Foto Dokumentasi --}}
                        <div class="gallery-item" style="background-color:#eaeaea;"></div>
                    @endforelse
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