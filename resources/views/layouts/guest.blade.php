<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Bintang Mulia</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <style>
        body {
            background-color: white; /* Mengubah latar belakang menjadi putih */
            position: relative; /* Untuk overlay */
            height: 100vh; /* Mengisi tinggi viewport */
            margin: 0; /* Menghilangkan margin default */
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8); /* Overlay putih dengan transparansi */
            z-index: 1; /* Menempatkan overlay di atas konten */
        }
        .login-box {
            margin-top: 10%;
            position: relative; /* Untuk menempatkan konten di atas overlay */
            z-index: 2; /* Menempatkan login box di atas overlay */
        }
        .login-logo a {
            font-size: 2rem;
            color: #333; /* Mengubah warna teks logo */
            text-shadow: none; /* Menghilangkan bayangan teks */
        }
        .logo {
            width: 150px; /* Mengatur lebar logo */
            height: auto; /* Memastikan tinggi proporsional */
            display: block; /* Menampilkan logo sebagai block */
            margin: 0 auto; /* Memusatkan logo */
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="overlay"></div> <!-- Overlay -->
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo" class="logo">
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        @yield('content')
    </div>
</div>
<!-- /.login-box -->

@vite('resources/js/app.js')
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
</body>
</html>