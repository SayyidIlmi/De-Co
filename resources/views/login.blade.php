<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | De-Co</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="login-page">
    <div class="login-wrapper">
        <div class="login-container">

            <div class="login-sidebar">
                <!-- Overlay Teks di Sidebar -->
                <h1 class="sidebar-logo">De-Co</h1>

                <div class="sidebar-footer">
                    <h2 class="sidebar-title">Dewan-Connect</h2>
                    <p class="sidebar-desc">
                        platform integrasi digital yang dirancang untuk memperkuat tata kelola Dewan Perwakilan
                        Mahasiswa.
                        Kami menghubungkan efisiensi manajemen legislatif dengan keterbukaan informasi publik,
                        menciptakan satu ruang terpusat untuk administrasi rapat yang rapi dan katalog kegiatan
                        organisasi yang informatif.
                    </p>

                </div>
            </div>

            <div class="login-content">
                <div class="brand">
                    <h1 class="logo-text">De-Co</h1>

                    <div class="toggle-auth">
                        <button class="btn-toggle active">Login</button>
                        <button class="btn-toggle">Register</button>
                    </div>

                    <p class="description">
                        Platform Manajemen Digital Dewan Perwakilan Mahasiswa & Pusat Agenda Kampus
                    </p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="username">username</label>
                        <input value="{{ old('username') }}" type="username" id="username" name="username"
                            placeholder="Enter your username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <input value="{{ old('password') }}" type="password" id="password" name="password"
                                placeholder="Enter your Password" required>
                            <a type="button" onclick="togglePassword()">
                                <i id="toggleIcon" class="fa-regular fa-eye-slash icon-toggle"></i>
                            </a>
                        </div>
                    </div>
                    @error('username')
                        <span style="color: red; font-size: 11px; margin-left: 15px;">{{ $message }}</span>
                    @enderror
                    <div class="form-footer">
                        <button type="submit" class="btn-login">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>
<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            // Ubah ikon ke mata terbuka
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            // Ubah ikon kembali ke mata coret
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
</script>

</html>