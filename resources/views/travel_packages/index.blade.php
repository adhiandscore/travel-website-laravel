@extends('layouts.frontend')

@section('content')


<!--==================== HOME ====================-->
<section>
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <section class="islands swiper-slide">
        <img src="{{ asset('frontend/assets/img/bali.jpg') }}" alt="" class="islands__bg" />

        <div class="islands__container container">
          <div class="islands__data">
            <h2 class="islands__subtitle">Eksplor Indonesia</h2>
            <h1 class="islands__title">Paket Wisata</h1>

            <form action="travel-packages">
              @csrf

              <div class="col-sm-8 d-flex mx-auto pt-2">
                <input class="form-control bg-white" type="text" placeholder="Cari Paket Anda" name="search"
                  value="{{ request('search') }}">
                <button class="btn btn-success ms-2" type="submit"> Search </button>
              </div>
            </form>

          </div>
        </div>
      </section>
    </div>
  </div>
</section>

<!--==================== POPULAR ====================-->
<section class="section" id="popular">
  <div class="container">
    <span class="section__subtitle" style="text-align: center">Semua</span>
    <h2 class="section__title" style="text-align: center">
      Paket Wisata di Indonesia
    </h2>

    <div class="popular__all">
      @if($travel_packages->isEmpty())
      <div class="text-center">
      <h3>Tidak Ditemukan</h3>
      <p>Paket wisata yang Anda cari tidak ditemukan.</p>
      </div>
    @else

      @foreach($travel_packages as $travel_package)
      <article class="popular__card">
      <a href="{{ route('travel_package.show', ['travel_package' => $travel_package->id]) }}">
      <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" class="popular__img" alt=""
      class="popular__img" />
      <div class="popular__data">
      <h2 class="popular__price"><span>Rp</span>{{ number_format($travel_package->price, 2) }}</h2>
      <h3 class="popular__title">{{ $travel_package->location }}</h3>
      <h5 class="popular__level">{{ $travel_package->level }}</h5>
      <p class="popular__description">{{ $travel_package->type }}</p>
      @foreach ($travel_packages as $travel_package)
        <div></div>
      <h5>
            Topsis Scores : 
          </h5>
      @endforeach
      <div class="rating">
        @for ($i = 1; $i <= 5; $i++)
      <i class="bx {{ $i <= $travel_package->rating ? 'bxs-star' : 'bx-star' }}" aria-hidden="true"></i>
    @endfor
      </div>
      </div>
      </a>
      </article>
    @endforeach
    @endif

      <section class="topsis">

        <div class="topsis">
          <h3>
            Topsis Scores
          </h3>
          <div class="packages">
          @foreach ($travel_packages as $travel_package)
        <div>
            <h2>{{ $travel_package->name }}</h2>
            <p>Price: {{ $travel_package->price }}</p>
            <p>Rating: {{ $travel_package->rating }}</p>
            <p>Score: {{ $travel_package->score }}</p>
        </div>
      @endforeach
          </div>
        </div>

      </section>
    </div>
  </div>
</section>
@endsection