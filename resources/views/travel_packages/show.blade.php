@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section class="blog section" id="blog">
  <div class="blog__container container">
    <div class="content__container">
      <div class="package-travel">
        <div class="islands booking desc">
          <div class="islands__container container">
            <div class="islands__container container img">
              @foreach($travel_package->galleries as $gallery)
          <img src="{{ asset('frontend/assets/img/bali.jpg') }}" alt="" class="islands__bg" />
        </div>
        <div class="islands__data">
          <h2 class="islands__subtitle">Explore</h2>
          <h1 class="islands__title">{{ $travel_package->location}} Paket {{ $travel_package->level}}</h1>
          <p class="islands__desc">{{ $travel_package->description}}</p>
        @endforeach
              <!-- Card untuk Rating -->
              <div class="card rating-card">
                <div class="rating">

                  <form action="{{ route('travel_packages.rate', $travel_package->id) }}" method="POST">
                    @csrf
                    <div class="rating-form">
                      @for ($i = 5; $i >= 1; $i--)
              <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required />
              <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
            @endfor
                      <button type="submit">Rate</button>
                    </div>
                </div>
              </div>
              @if ($errors->any())
          <div class="alert alert-danger">
          {{ $errors->first() }}
          </div>
        @endif
              </form>
            </div>
          </div>
</section>

<section>
  <!-- Menampilkan rating yang sudah diberikan -->
  <div class="current-rating">
    <h3>Rating Saat Ini:
      @if($travel_package->rating)
      @for ($i = 1; $i <= $travel_package->rating; $i++)
      <i class="fas fa-star"></i>
    @endfor
    @else
      <h4>"Belum ada rating"</h4>
    @endif
    </h3>
  </div>
</section>

<div class="contact-form">
  <h2 class="form-title">Booking Sekarang</h2>
  <form action="{{ route('booking.store') }}" method="POST">
    @csrf
    <div class="form-row">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="number_phone">No. HP</label>
        <input type="text" name="number_phone" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="date">Tanggal</label>
        <input type="date" name="date" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="travel_package_id">Paket Wisata</label>
      <h2 class="form-title">Paket Wisata yang Dipilih</h2>
      <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}">
      <p>{{ $travel_package->location}}, <span>{{ $travel_package->level}}</span></p>
    </div>
    <button type="submit" class="btn btn-booking">Booking Sekarang</button>

  </form>
</div>

<section class="section" id="popular">
  <div class="container">
    <span class="section__subtitle" style="text-align: center">Paket Perjalanan</span>
    <h2 class="section__title" style="text-align: center">
      Tur Terbaik untuk Anda
    </h2>

    <div class="popular__all">
      @foreach($travel_packages as $travel_package)
      <article class="popular__card">
                    <a href="{{ route('travel_package.show', ['travel_package'=>$travel_package->id]) }}">
                      <div class="popular__data">
                        <img
                        src="{{ Storage::url($travel_package->galleries->first()->images) }}"class="popular__img" 
                        alt="" class="popular__img"
                        />
                        <h2 class="popular__price"><span>Rp</span>{{ number_format($travel_package->price, 2) }}</h2>
                        <h3 class="popular__title">{{ $travel_package->location }}</h3>
                        <h5 class="popular__level">{{ $travel_package->level }}</h5>
                        <p class="popular__description">{{ $travel_package->type }}</p>
                        <div class="rating">
                          @for ($i = 1; $i <= 5; $i++)
                          <i class="bx {{ $i <= $travel_package->rating ? 'bxs-star' : 'bx-star' }}" aria-hidden="true"></i>
                          @endfor
                        </div>
                      </div>
                    </a>
                    </article>
    @endforeach
    </div>
  </div>
</section>


@if(session()->has('message'))
  <div id="alert" class="alert">
    {{ session()->get('message') }}
    <i class='bx bx-x alert-close' id="close"></i>
  </div>
@endif


@push('style-alt')
  <style>
    .blog.section {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 100%;
    margin-bottom: 20%;
    }

    .islands__container.img {
    text-align: center;
    padding: 70%;
    margin-bottom: -10%;
    margin-top: 10%;
    }

    .islands__bg {
    border-radius: 10px;
    }

    .islands__data {
    text-align: center;
    height: 100vh;
    margin-bottom: 45%;
    }

    .islands__subtitle {
    font-size: 1.5rem;
    color: #007BFF;
    margin-left: 40%;
    margin-bottom: 10px;
    }

    .islands__title {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #333;
    margin-left: 40%;
    }

    .islands__desc {
    font-size: 1rem;
    color: #555;

    }

    .rating-card {
    padding: 20px;
    border: none;
    margin: 20px 0;
    text-align: center;
    margin-left: 40%;
    margin-bottom: 40%;
    }

    .rating {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
    }

    .rating input[type="radio"] {
    display: none;
    }

    .rating label {
    font-size: 30px;
    cursor: pointer;
    transition: color 0.3s;
    }

    .current-rating {
    display: flex;
    justify-content: center;
    margin-bottom: -25px;
    }


    .rating input[type="radio"]:checked~label {
    color: #ffcc00;
    }

    .rating label:hover,
    .rating label:hover~label {
    color: #ffcc00;
    }

    .rating-form {
    margin-top: 10px;
    }

    .rating-form button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    }

    .rating-form button:hover {
    background-color: #0056b3;
    }

    .contact-form {
    padding: 100px;
    background-color: white;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    color: #3e3e3e;
    margin-top: 100px 
    }

    .form-title {
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: 60px;
    }

    .form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    }

    .form-group {
    flex: 100px;

    }

    .form-group:last-child {
    margin-right: -100px;
    }

    .form-control {
    width: 50%;
    padding: 8px;
    border-top: 2px;
    border-right: 2px;
    border-left: 2px;
    border-radius: 1px;
    transition: background-color 0.3s;
    }

    .btn-booking {
    background-color: #007BFF;
    margin-top: 50px;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
    }

    .btn-booking:hover {
    background-color: #0056b3;
    }

    @media (max-width: 768px) {
    .package-travel {
      width: 90%;
    }
    }
  </style>
@endpush


@push('script-alt')
  <script>
    let galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 0,
    slidesPerView: 0,
    });

    let galleryTop = new Swiper('.gallery-top', {
    effect: 'fade',
    loop: true,

    thumbs: {
      swiper: galleryThumbs,
    },
    });

    const close = document.getElementById('close');
    const alert = document.getElementById('alert');
    if (close) {
    close.addEventListener('click', function () {
      alert.style.display = 'none';
    })
    }
  </script>
@endpush