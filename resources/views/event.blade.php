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
            <h1 class="catalog-title">Katalog event</h1>
            <div class="catalog-tools">
                <div class="search-wrapper">
                    <form action="{{ url('/event') }}" method="GET"
                        style="display: flex; width: 100%; align-items: center;">
                        <i class="fa-solid fa-search" style="margin-right: 10px; color: #64748b;"></i>
                        {{-- UPDATE: Tambahkan atribut name="search" dan ambil value lama jika ada --}}
                        <input type="text" name="search" id="search-event" class="search-input"
                            placeholder="Cari Event lalu tekan Enter..." value="{{ request('search') }}">
                    </form>
                </div>
                @if(Auth::check() && Auth::user()->role === 'koordinator')
                    <a href="{{ url('/event/create') }}" class="btn-create" id="btn-create-event"
                        style="text-decoration: none;">
                        <i class="fa-solid fa-plus"></i> Buat event baru
                    </a>
                @endif
            </div>
        </div>

        <div class="event-grid">
            @forelse($semua_event as $index => $item)
            <div class="event-card">
                <div class="card-img-wrapper bg-gradient-1">
                    @if($item->file_path)
                    <img src="{{ asset('storage/' . $item->file_path) }}" alt="Event Image" style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
                    @endif
                </div>
                <h2 class="event-card-title">{{ $item->judul }}</h2>
                <p class="event-card-desc">{{ $item->deskripsi }}</p>
                <div class="event-date">{{ $item->tanggal_event }}</div>
                <div class="card-actions">
                    <a href="/event/{{ $item->id }}" class="btn-detail">Lihat detail...</a>
                @if(Auth::check())
                <a onclick="daftarStaffInstan({{ $item->id }})" class="btn-register">Daftar Instan ⚡</a>
                @else
                <a href="/event/daftar/{{ $item->id }}" class="btn-register">Pendaftaran</a>
                @endif
                </div>
            </div>
            @empty
        {{-- Tampilan Cadangan Jika Database Event Masih Kosong --}}
        <div class="event-card" style="grid-column: 1 / -1; text-align: center; padding: 50px; width: 100%;">
            <p style="color: #64748b; font-size: 16px;">Belum ada agenda katalog event yang diterbitkan saat ini.</p>
        </div>
    @endforelse
        </div>
        @if ($semua_event->hasPages())
                <div class="pagination-wrapper">

                    {{-- Tombol Previous (Panah Kiri) --}}
                    @if ($semua_event->onFirstPage())
                        {{-- Jika di halaman pertama, tombol disabled/tidak bisa diklik --}}
                        <span class="page-link-custom disabled" style="opacity: 0.5; cursor: not-allowed;">
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $semua_event->previousPageUrl() }}" class="page-link-custom">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    @endif


                    {{-- Loop Angka Halaman Dinamis --}}
                    @foreach (range(1, $semua_event->lastPage()) as $page)
                        @if ($page == $semua_event->currentPage())
                            {{-- Jika angka halaman sama dengan halaman aktif saat ini --}}
                            <a href="#" class="page-link-custom active">{{ $page }}</a>
                        @else
                            {{-- Jika halaman lain, berikan link url dinamis --}}
                            <a href="{{ $semua_event->url($page) }}" class="page-link-custom">{{ $page }}</a>
                        @endif
                    @endforeach


                    {{-- Tombol Next (Panah Kanan) --}}
                    @if ($semua_event->hasMorePages())
                        <a href="{{ $semua_event->nextPageUrl() }}" class="page-link-custom">
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
<script>
function daftarStaffInstan(eventId) {
    if(!confirm('Apakah kamu ingin mendaftar ke event ini menggunakan akun Staff internal?')) return;

    const formData = new FormData();
    formData.append('event_id', eventId);
    formData.append('_token', '{{ csrf_token() }}');

    fetch("{{ url('/event/daftar/{id}') }}".replace('{id}', eventId), {
        method: "POST",
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert("🎉 " + data.message + "\nTerdaftar sebagai: " + data.pendaftar.username);
            window.location.reload();
        } else {
            alert("⚠️ " + data.message);
        }
    });
}
</script>
</html>