<section class="popular-section" id="popular">
  <div class="container">
    <span class="section__subtitle" style="text-align: center">Paket Perjalanan</span>
    <h2 class="section__title" style="text-align: center">Tur Terbaik untuk Anda</h2>

    <div class="popular__all">
      @foreach($travel_packages as $travel_package)
      <article class="popular__card">
      <a href="{{ route('travel_package.show', ['travel_package' => $travel_package->id]) }}">
        <div class="popular__data">
        <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" class="popular__img"
          alt="Gallery Image" />
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