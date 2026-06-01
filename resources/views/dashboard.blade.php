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
                <a href="/dashboard" class="active" >Dashboard</a>
                <a href="/rapat">Manajemen Rapat</a>
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

    <main class="container">
        <section class="hero">
            <div class="hero-text">
                <h1>Platform Manajemen Digital Dewan Perwakilan Mahasiswa & pusat agenda kampus</h1>
                <p>platform integrasi digital yang dirancang untuk memperkuat tata kelola Dewan Perwakilan Mahasiswa. Kami menghubungkan efisiensi manajemen legislatif dengan keterbukaan informasi publik, menciptakan satu ruang terpusat untuk administrasi rapat yang rapi dan katalog kegiatan organisasi yang informatif.</p>
                 @if(Auth::user()->role === 'koordinator')
                    <button class="btn-primary" onclick="window.location.href='{{ url('/rapat') }}'">Mulai kelola rapat</button>
                @else
                    <button class="btn-primary" onclick="window.location.href='{{ url('/rapat') }}'">Lihat jadwal rapat</button>
                @endif
            </div>
            <div class="hero-placeholder"></div>
        </section>

        <section class="section-group">
            <h2 class="section-title">Agenda Rapat</h2>
            <div class="grid-4">
                <div onclick="window.location.href='{{ url('/rapat') }}'" class="meeting-img-placeholder bg-gradient-1"></div>
                <div onclick="window.location.href='{{ url('/rapat') }}'" class="meeting-img-placeholder bg-gradient-2"></div>
                <div onclick="window.location.href='{{ url('/rapat') }}'" class="meeting-img-placeholder bg-gradient-3"></div>
                <div onclick="window.location.href='{{ url('/rapat') }}'" class="meeting-img-placeholder bg-gradient-4"></div>
            </div>
            <div class="view-more">
                <a href="/rapat">Selengkapnya ></a>
            </div>
        </section>

        <section class="section-group">
            <h2 class="section-title">Katalog Event</h2>
            <div class="grid-2">
                 @forelse($semua_event as $index => $item)
                <div class="card">
                    <div class="card-img img-gray">
                    @if($item->file_path)
                    <img src="{{ asset('storage/' . $item->file_path) }}" alt="Event Image" style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
                    @endif
                    </div>
                    <div class="card-content">
                        <h3>{{$item->judul}}</h3>
                        <div class="author">
                            <div class="author-img"></div>
                            <span>Lina</span>
                        </div>
                        <p>{{$item->deskripsi}}</p>
                        <div class="card-footer">
                            <a href="/event/{{$item->id}}">Read more</a>
                        </div>
                    </div>
                </div>
                @empty
                <p style="color: #475569;">Belum ada event yang tersedia.</p>
                @endforelse
            </div>
            <div class="view-more">
                <a href="/event">Selengkapnya ></a>
            </div>
        </section>
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