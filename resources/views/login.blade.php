<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | De-Co</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="login-page">
    <div class="login-wrapper">
        <div class="login-container">
            
            <div class="login-sidebar">
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
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                            <i class="fa-regular fa-eye-slash icon-toggle"></i>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn-login">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>