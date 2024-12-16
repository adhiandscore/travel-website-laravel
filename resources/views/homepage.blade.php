@extends('layouts.frontend')
@props(['rate'])



@section('content')
<!--==================== HOME ====================-->
<section>
    <div class="swiper-container">
        <div>
            <!--========== ISLANDS 1 ==========-->
            <section class="islands">
                <img src="{{ asset('frontend/assets/img/hero.jpg') }}" alt="" class="islands__bg" />
                <div class="bg__overlay" style="background-color: rgba(0, 0, 0, 0.5);">
                    <div class="islands__container container">
                        <div class="islands__data" style="z-index: 99; position: relative">

                            <h1 class="islands__title" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                                Indonesia Wonderful
                            </h1>
                            <p class="islands__description">
                                Solusi Perjalanan Anda
                                Dengan Memberikan Pengalaman yang berharga <br />
                                Hanya di <span
                                    style="color:bisque; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Bintang
                                    Mulia Tour dan Travel</span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!--==================== LOGOS ====================-->
<section class="logos" style="margin-top: 9rem; padding-bottom: 3rem">
    <div class="logos__container container grid">
        <div class="logos__img">
            <img src="{{ asset('frontend/assets/img/tripadvisor.png') }}" alt="" />
        </div>
        <div class="logos__img">
            <img src="{{ asset('frontend/assets/img/airbnb.png') }}" alt="" />
        </div>
        <div class="logos__img">
            <img src="{{ asset('frontend/assets/img/booking.png') }}" alt="" />
        </div>
        <div class="logos__img">
            <img src="{{ asset('frontend/assets/img/airasia.png') }}" alt="" />
        </div>
    </div>
</section>

<!--==================== VALUE ====================-->
<section class="value section" id="value">
    <div class="value__container container grid">
        <div class="value__images">
            <div class="value__orbe"></div>

            <div class="value__img">
                <img src="{{ asset('frontend/assets/img/team.jpg') }}" alt="" />
            </div>
        </div>

        <div class="value__content">
            <div class="value__data">
                <span class="section__subtitle">Mengapa Memilih Kami?</span>
                <h2 class="section__title">
                    Pengalaman Yang Kami Janjikan Kepada Anda
                </h2>
                <p class="value__description">
                    Kami selalu siap melayani dengan memberikan pelayanan terbaik untuk Anda. Kami membuat pilihan yang
                    baik untuk bepergian keliling dunia.
                </p>
            </div>

            <div class="value__accordion">
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-shield-x value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Wisata Terbaik di Indonesia
                        </h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>

                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            We provides the best places around the
                            world and have a good quality of
                            service.
                        </p>
                    </div>
                </div>
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-x-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Harga Terjangkau untuk Anda
                        </h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>

                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            We try to make your budget fit with the
                            destination that you want to go.
                        </p>
                    </div>
                </div>
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-bar-chart-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Rencana Terbaik untuk Waktu Anda
                        </h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>

                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            Provides you with time properly.
                        </p>
                    </div>
                </div>
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-check-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Jaminan Keamanan
                        </h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>

                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            We make sure that our services have a
                            good of security
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center">Blog Kami</span>
        <h2 class="section__title" style="text-align: center">
            Perjalanan Terbaik untuk Anda
        </h2>

        <div class="blog__content grid">
            @foreach($blogs as $blog)
                <article class="blog__card">
                    <div class="blog__image">
                        <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                    <div class="blog__data">
                        <h2 class="blog__title">
                            {{ $blog->title }}
                        </h2>
                        <p class="blog__description">
                            {{ $blog->excerpt }}
                        </p>

                        <div class="blog__footer">
                            <div class="blog__reaction">
                                {{ date('d M Y', strtotime($blog->created_at)) }}
                            </div>
                            <div class="blog__reaction">
                                <i class="bx bx-show"></i>
                                <span>{{ $blog->reads }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection