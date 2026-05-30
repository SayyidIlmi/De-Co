<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | De-Co</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
        /* Menggunakan grid bawaan registrasi agar input Nama & Email sejajar jika layar lebar */
        .register-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 20px;
        }
        .register-full-width {
            grid-column: span 2;
        }
        /* Handle responsivitas grid form internal */
        @media (max-width: 480px) {
            .register-form-grid {
                grid-template-columns: 1fr;
            }
            .register-full-width {
                grid-column: span 1;
            }
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="login-page">
    <div class="login-wrapper">
        <div class="login-container">

            <div class="login-sidebar">
                <h1 class="sidebar-logo">De-Co</h1>

                <div class="sidebar-footer">
                    <h2 class="sidebar-title">Dewan-Connect</h2>
                    <p class="sidebar-desc">
                        platform integrasi digital yang dirancang untuk memperkuat tata kelola Dewan Perwakilan Mahasiswa.
                        Kami menghubungkan efisiensi manajemen legislatif dengan keterbukaan informasi publik,
                        menciptakan satu ruang terpusat untuk administrasi rapat yang rapi dan katalog kegiatan organisasi yang informatif.
                    </p>
                </div>
            </div>

            <div class="login-content">
                <div class="brand">
                    <h1 class="logo-text">De-Co</h1>

                    <div class="toggle-auth">
                        <button class="btn-toggle" onclick="window.location.href='{{ route('login') }}'">Login</button>
                        <button class="btn-toggle active">Register</button>
                    </div>

                    <p class="description">
                        Buat akun baru untuk bergabung dalam Platform Manajemen Digital Dewan Perwakilan Mahasiswa.
                    </p>
                </div>

                <form action="/register" method="POST" class="login-form">
                    @csrf
                    
                    <div class="register-form-grid">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input value="{{ old('name') }}" type="text" id="name" name="name"
                                placeholder="Enter your full name" required>
                            @error('name')
                                <span style="color: red; font-size: 11px; display: block; margin-top: 5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" type="email" id="email" name="email"
                                placeholder="Enter your email" required>
                            @error('email')
                                <span style="color: red; font-size: 11px; display: block; margin-top: 5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group register-full-width">
                            <label for="username">Username</label>
                            <input value="{{ old('username') }}" type="text" id="username" name="username"
                                placeholder="Create your username" required>
                            @error('username')
                                <span style="color: red; font-size: 11px; display: block; margin-top: 5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group register-full-width">
                            <label for="password">Password</label>
                            <div class="input-with-icon">
                                <input type="password" id="password" name="password"
                                    placeholder="Minimum 8 characters" required>
                                <a type="button" onclick="togglePassword('password', 'toggleIcon1')">
                                    <i id="toggleIcon1" class="fa-regular fa-eye-slash icon-toggle"></i>
                                </a>
                            </div>
                            @error('password')
                                <span style="color: red; font-size: 11px; display: block; margin-top: 5px;">{{ $message }}</span>
                            @enderror
</div>
                    </div>

                    <div class="form-footer" style="margin-top: 15px;">
                        <button type="submit" class="btn-login">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

<script>
    // Fungsi toggle password yang fleksibel untuk Password & Confirm Password
    function togglePassword(fieldId, iconId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
</script>

</html>