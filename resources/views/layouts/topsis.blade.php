<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>{{ config('app.name', 'Admin Bintang Mulia') }}</title> --}}
    <title>Admin Bintang Mulia</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 10vh;
            padding: 20px;
        }
    </style>
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @yield('contentTopsis')
    </div>
</body>

</html>