<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Dewan Connect</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De-Co | Dewan Connect</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- Tambahan Style Ringan untuk Komponen Multi-Select Tag agar menyatu dengan CSS kamu --}}
    <style>
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 6px;
            min-height: 44px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background: #fff;
            align-items: center;
        }

        .user-tag {
            display: inline-flex;
            align-items: center;
            background-color: #136a6a;
            color: white;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 14px;
            gap: 8px;
        }

        .user-tag i {
            cursor: pointer;
            color: #9cd4d4;
        }

        .user-tag i:hover {
            color: #fff;
        }

        .search-user-input {
            border: none !important;
            outline: none !important;
            flex: 1;
            min-width: 150px;
            padding: 4px;
            background: transparent !important;
            /* Mencegah warna background bawaan menimpa wadah */
        }

        /* PERBAIKAN UTAMA: Dropdown List */
        .dropdown-users-list {
            position: absolute;
            z-index: 9999;
            /* Memaksa dropdown berada di lapisan paling atas */
            background: #2d3748;
            /* Mengubah background menjadi gelap/sesuaj tema popup dimas */
            color: #ffffff;
            border: 1px solid #4a5568;
            border-radius: 6px;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            display: none;
            margin-top: 5px;
            list-style: none;
            padding: 0;
            left: 0;
        }

        .dropdown-users-list li {
            padding: 10px 14px;
            cursor: pointer;
            font-size: 15px;
            border-bottom: 1px solid #4a5568;
            transition: background 0.2s;
        }

        .dropdown-users-list li:last-child {
            border-bottom: none;
        }

        .dropdown-users-list li:hover {
            background-color: #136a6a;
            /* Menggunakan warna aksen hijau De-Co saat di-hover */
        }

        .dropdown-users-list li.hidden-option {
            display: none !important;
        }
    </style>

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

    <main class="container" style="padding-top: 40px;">

        <a href="/rapat" class="form-header-link">
            <i class="fas fa-chevron-left"></i> Buat rapat baru
        </a>
        @if ($errors->any())
                <div style="background-color: #fef2f2; border: 1px solid #ef4444; padding: 15px; border-radius: 6px; margin-bottom: 20px; color: #b91c1c;">
                    <strong>⚠️ Validasi Gagal Berhasil Dipost:</strong>
                    <ul style="margin: 5px 0 0 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="form-card">
            <form action="/rapat" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="nama_rapat">Nama rapat</label>
                        <input type="text" id="nama_rapat" name="nama_rapat" class="input-custom"
                            placeholder="Adobe XD Auto - Animate : Your Guide to Creating" value="{{ old('nama_rapat') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="waktu_mulai">Tanggal mulai</label>
                        <input type="date" id="waktu_mulai" name="tgl_mulai" class="input-custom"
                            placeholder="September 24, 2017 07:59 am" value="{{ old('tgl_mulai') }}">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi/link virtual meeting</label>
                        <input type="text" id="lokasi" name="location" class="input-custom"
                            placeholder="2118 Thornridge Cir, Syracuse, Connecticut 35624" value="{{ old('location') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="penyelenggara">Nama Penyelenggara</label>
                        <input type="text" id="penyelenggara" name="penanggung_jawab" class="input-custom"
                            placeholder="Lina" value="{{ old('penanggung_jawab') }}">
                    </div>
                    <div class="form-group">
                        <label for="agenda">Agenda</label>
                        <input type="text" id="agenda" name="agenda" class="input-custom"
                            placeholder="Pembahasan roadmap Q2 dan koordinasi proyek prioritas" value="{{ old('agenda') }}">
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group">
                        <label for="link_notulensi">Link dokumen notulensi</label>
                        <input type="url" id="link_notulensi" name="notulensi" class="input-custom"
                        placeholder="https://docs.google.com/document/d/1BLiRjSrieNyMLyRkrTplJaj_HH8ki" value="{{ old('notulensi') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group full-width" style="position: relative;">
                        <label for="search-user-input">Tambah Peserta +</label>
                        <div class="tags-container" id="tags-wrapper">
                            <input type="text" id="search-user-input" class="search-user-input"
                                 value="{{ old('undangan_user_id') ? implode(', ', $users->whereIn('id', old('undangan_user_id'))->pluck('username')->toArray()) : '' }}">
                        </div>
    
                        <ul class="dropdown-users-list" id="users-dropdown">
                            @foreach($users as $user)
                                <li data-id="{{ $user->id }}" data-name="{{ $user->username }}">
                                    <i class="fa-solid fa-user-plus" style="margin-right: 8px;"></i>
                                    {{ $user->username }} ({{ ucfirst($user->role) }})
                                </li>
                            @endforeach
                        </ul>
    
                        <select name="undangan_user_id[]" id="hidden-select-users" multiple
                            style="display: none;"></select>
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
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-user-input');
            const dropdown = document.getElementById('users-dropdown');
            const tagsWrapper = document.getElementById('tags-wrapper');
            const hiddenSelect = document.getElementById('hidden-select-users');
            const dropdownItems = dropdown.querySelectorAll('li');

            // 1. Munculkan list dropdown saat kotak pencarian diklik
            searchInput.addEventListener('focus', function() {
                dropdown.style.display = 'block';
                filterDropdownItems(this.value);
            });
            
            // Tutup dropdown otomatis jika fungsionaris mengklik area luar form
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.style.display = 'none';
                }
            });

            // 2. Logika Menyaring Nama saat Diketik
            searchInput.addEventListener('input', function() {
                filterDropdownItems(this.value);
            });

            function filterDropdownItems(query) {
                const keyword = query.toLowerCase();
                dropdown.style.display = 'block';

                dropdownItems.forEach(item => {
                    if (item.classList.contains('hidden-option')) return;

                    const name = item.getAttribute('data-name').toLowerCase();
                    if (name.includes(keyword)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // 3. Logika Menghubungkan klik Pilihan menjadi Chip Tag & Array Form
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    const userName = this.getAttribute('data-name');

                    // Buat struktur visual chip tag
                    const tag = document.createElement('div');
                    tag.classList.add('user-tag');
                    tag.setAttribute('data-id', userId);
                    tag.innerHTML = `${userName} <i class="fa-solid fa-xmark remove-user-btn"></i>`;
                    
                    // Tempelkan chip sebelum kolom input ketikan teks
                    tagsWrapper.insertBefore(tag, searchInput);

                    // Suntikkan data ID-nya ke elemen select multiple tersembunyi
                    const option = document.createElement('option');
                    option.value = userId;
                    option.selected = true;
                    option.setAttribute('id', `opt-${userId}`);
                    hiddenSelect.appendChild(option);

                    // Berikan tanda dan sembunyikan agar tidak bisa dipilih dua kali
                    this.classList.add('hidden-option');
                    this.style.display = 'none';

                    // Bersihkan kolom teks pencarian
                    searchInput.value = '';
                    dropdown.style.display = 'none';
                    searchInput.focus();
                });
            });

            // 4. Logika Pembatalan (Klik tanda X pada chip tag)
            tagsWrapper.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-user-btn')) {
                    const tag = e.target.parentElement;
                    const userId = tag.getAttribute('data-id');

                    // Hapus visual chip tag dari layar
                    tag.remove();

                    // Hapus option array dari payload form kiriman data
                    const optionToRemove = document.getElementById(`opt-${userId}`);
                    if (optionToRemove) optionToRemove.remove();

                    // Kembalikan nama user tersebut ke daftar pencarian dropdown
                    const originalOption = dropdown.querySelector(`li[data-id="${userId}"]`);
                    if (originalOption) {
                        originalOption.classList.remove('hidden-option');
                        originalOption.style.display = 'block';
                    }
                }
            });
        });
    </script>
</body>

</html>