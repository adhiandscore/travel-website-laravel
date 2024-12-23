<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Link Folder CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}" />


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @stack('style-alt')

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                },
            },
        };
    </script>

    <title>Bintang Mulia</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header bg-white" id="header">
        <nav class="nav container">

            <a href="{{ route('homepage') }}" class="nav__logo"><img src="{{ asset('frontend/assets/img/logo.png') }}"
                    alt=""></a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}"
                            class="nav__link {{ request()->is('/') ? ' active-link' : '' }} text-blue-400">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('travel_package.index') }}"
                            class="nav__link {{ request()->is('travel-packages') || request()->is('travel-packages/*') ? ' active-link' : '' }} text-blue-400">
                            <i class="bx bx-building-house"></i>
                            <span>Paket Wisata</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('blog.index') }}"
                            class="nav__link {{ request()->is('blogs') || request()->is('blogs/*') ? ' active-link' : '' }} text-blue-400">
                            <i class="bx bx-award"></i>
                            <span>Blog & Berita</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('contact') }}"
                            class="nav__link {{ request()->is('contact') ? ' active-link' : '' }} text-blue-400">
                            <i class="bx bx-phone"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- theme -->
            <i class="bx bx-moon change-theme" id="theme-button"></i>

            <a href="{{ route('login') }}" class="button nav__button">Admin</a>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <div class="min-h-screen flex flex-column">
        <main class="main flex-grow pb-96">
            @yield('content')
        </main>
    </div>
    <!--==================== FOOTER ====================-->
    

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('script-alt')
</body>

</html>
