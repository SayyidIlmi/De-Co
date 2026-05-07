<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Platform Manajemen Digital Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-bg { background-color: #1a8282; border-radius: 0 0 50% 50% / 0 0 15% 15%; }
        .feature-card { transition: transform 0.3s; }
        .feature-card:hover { transform: translateY(-10px); }
    </style>
</head>
<body class="bg-gray-50 font-sans">

    <header class="hero-bg text-white pb-24">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold italic">De-Co</div>
            <div class="hidden md:flex space-x-8 text-sm">
                <a href="#" class="hover:text-gray-200">Home</a>
                <a href="#" class="hover:text-gray-200">About</a>
                <a href="#" class="hover:text-gray-200">Service</a>
                <a href="#" class="hover:text-gray-200">Blog</a>
                <a href="#" class="hover:text-gray-200">Contact</a>
            </div>
            <div class="space-x-4">
                <a href="/login"><button class="px-4 py-2 border border-white rounded-full text-sm">Login</button></a>
                <button class="px-4 py-2 bg-white text-teal-700 rounded-full text-sm font-semibold">Sign Up</button>
            </div>
        </nav>

        <div class="container mx-auto px-6 mt-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    DE-CO Platform Manajemen Digital Dewan Perwakilan Mahasiswa & Pusat Agenda Kampus
                </h1>
                <div class="mt-8 flex space-x-4">
                    <button class="bg-white text-teal-700 px-6 py-3 rounded-full font-bold shadow-lg">Daftar Sekarang</button>
                    <button class="flex items-center space-x-2 text-sm">
                        <span class="p-2 bg-white/20 rounded-full"><i class="fas fa-play"></i></span>
                        <span>Lihat Video Profil</span>
                    </button>
                </div>
            </div>
            <div class="md:w-1/2 mt-12 md:mt-0 relative">
                <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm border border-white/20">
                    <img src="https://via.placeholder.com/600x400" alt="Dashboard Preview" class="rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </header>

    <section class="container mx-auto px-6 -mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
            $benefits = [
                ['icon' => 'fa-users', 'title' => 'Pengelolaan Agenda', 'desc' => 'Atur jadwal kegiatan organisasi secara terpusat.'],
                ['icon' => 'fa-file-alt', 'title' => 'Verifikasi Berkas & Transparansi', 'desc' => 'Pantau status dokumen dan transparansi anggaran.'],
                ['icon' => 'fa-comments', 'title' => 'Pusat Aspirasi', 'desc' => 'Wadah mahasiswa untuk menyuarakan aspirasi dengan mudah.']
            ];
        @endphp

        @foreach($benefits as $item)
        <div class="bg-white p-8 rounded-2xl shadow-xl text-center feature-card">
            <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas {{ $item['icon'] }} text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-4 text-teal-900">{{ $item['title'] }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
        </div>
        @endforeach
    </section>

    <section class="container mx-auto px-6 py-24 space-y-32">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="https://via.placeholder.com/500x350" class="rounded-3xl shadow-lg" alt="Interface">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-teal-900 mb-6 leading-tight">A user interface designed for the classroom</h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-teal-500 mt-1"></i>
                        <p class="text-gray-600">Fitur navigasi yang intuitif untuk kemudahan akses berkas mahasiswa.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-teal-500 mt-1"></i>
                        <p class="text-gray-600">Integrasi langsung dengan kalender akademik kampus.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col md:flex-row-reverse items-center gap-12">
            <div class="md:w-1/2">
                <img src="https://via.placeholder.com/500x350" class="rounded-3xl shadow-lg" alt="Assessment">
            </div>
            <div class="md:w-1/2 text-right md:text-left">
                <h2 class="text-3xl font-bold text-teal-900 mb-6">Assessments, Quizzes, Tests</h2>
                <p class="text-gray-600 mb-6">Sistem evaluasi kinerja organisasi yang objektif dan terdokumentasi dengan baik dalam satu platform.</p>
                <button class="text-teal-600 font-bold underline">Pelajari Selengkapnya</button>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-20">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-teal-900">Latest News and Resources</h2>
                    <p class="text-gray-500 mt-2">Update terbaru seputar dunia kampus dan organisasi.</p>
                </div>
                <button class="text-teal-600 font-bold">Lihat Semua</button>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="group">
                    <img src="https://via.placeholder.com/800x450" class="rounded-2xl mb-6 w-full object-cover h-64 shadow-md group-hover:shadow-xl transition-all" alt="News">
                    <span class="px-3 py-1 bg-teal-100 text-teal-600 rounded-full text-xs font-bold">NEWS</span>
                    <h3 class="text-2xl font-bold mt-4 mb-2 group-hover:text-teal-700">Inovasi Digitalisasi Organisasi Mahasiswa 2026</h3>
                    <p class="text-gray-500">Meningkatkan efisiensi kerja DPM melalui sistem satu pintu yang terintegrasi...</p>
                </div>
                
                <div class="space-y-8">
                    @for($i = 0; $i < 3; $i++)
                    <div class="flex gap-4 group">
                        <img src="https://via.placeholder.com/150x100" class="rounded-xl object-cover" alt="Thumb">
                        <div>
                            <span class="text-xs font-bold text-teal-600">TIPS & TRICK</span>
                            <h4 class="font-bold group-hover:text-teal-700">Cara mengelola agenda besar dengan efektif menggunakan De-Co</h4>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-teal-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between mb-12">
                <div class="mb-8 md:mb-0">
                    <div class="text-3xl font-bold italic mb-4">De-Co</div>
                    <p class="text-teal-200/60 max-w-xs text-sm leading-relaxed">
                        Platform Manajemen Digital untuk masa depan organisasi kampus yang lebih transparan dan efisien.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-sm">
                    <div>
                        <h5 class="font-bold mb-4">Layanan</h5>
                        <ul class="space-y-2 text-teal-200/60">
                            <li><a href="#">Manajemen Agenda</a></li>
                            <li><a href="#">E-Aspirasi</a></li>
                            <li><a href="#">Arsip Digital</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold mb-4">Perusahaan</h5>
                        <ul class="space-y-2 text-teal-200/60">
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Kontak</a></li>
                            <li><a href="#">Karir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="border-teal-800 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-teal-200/40">
                <p>&copy; 2026 De-Co Platform. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <i class="fab fa-facebook hover:text-white cursor-pointer"></i>
                    <i class="fab fa-instagram hover:text-white cursor-pointer"></i>
                    <i class="fab fa-twitter hover:text-white cursor-pointer"></i>
                    <i class="fab fa-linkedin hover:text-white cursor-pointer"></i>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>