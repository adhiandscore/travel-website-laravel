@extends('layouts.frontend')

@section('content')

<!--==================== HOME ====================-->

<section class="relative bg-cover bg-center"
  style="background-image: url('{{ asset('frontend/assets/img/bali.jpg') }}'); height: 850px;">
  <!-- Card Container -->
  <div
    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-50 shadow-lg rounded-lg p-6 max-w-md w-full">

    <h2 class="text-3xl font-bold text-blue-900 mt-9 text-center">Explor Paket Wisata</h2>

    <!-- Search Form -->
    <form action="travel-packages" method="GET" class="mt-6">
      @csrf
      <div class="flex justify-center gap-4">
        <input class="form-control bg-white border border-gray-300 rounded-md px-4 py-2 w-full max-w-sm" type="text"
          placeholder="Cari Paket Anda" name="search" value="{{ request('search') }}">
        <button id="searchButton" class="btn bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition" type="submit">
          Search
        </button>
      </div>
    </form>
  </div>
</section>

<div class="container">
  <div class="card card border-0">
    <!-- Form Pencarian yang sudah ada -->
    <div class="bg-blue-500 p-9 rounded-lg ">

      <!-- Form tambahan di bawahnya -->
      <div class="grid grid-cols-4 gap-4 mt-6">
        <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center">
          <span class="text-center text-gray-700 font-semibold">Pencarian Lokasi</span>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center">
          <span class="text-center text-gray-700 font-semibold">Tentukan Tanggal</span>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center">
          <span class="text-center text-gray-700 font-bold">Berapa Banyak Orang</span>
        </div>
        <div class=" p-4 rounded-lg shadow-lg flex justify-center">
          <button id="searchButton" class="bg-green-500 text-white py-2 px-6 rounded-lg font-bold hover:bg-green-600">Cari!</button>
          
        </div>
      
      </div>

      <!-- Tombol Cari -->
      
    </div>
  </div>
</div>


<!--==================== POPULAR ====================-->
<section class="section" id="popular">
  <div class="flex flex-col items-center">
    <span class="text-orange-500 text-lg font-medium">
      Semua
    </span>
    <h2 class="text-4xl font-bold mb-20 text-blue-800 mt-2" id="targetContent" >
      Paket Wisata di Indonesia
    </h2>
  </div>

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
      <h2 class="popular__price font-regular mb-2 text-gray-800 "><span>Rp  &nbsp;</span>{{ number_format($travel_package->price, 2) }}</h2>
      <h3 class="popular__title text-2xl font-bold mb-2 text-gray-800 ">{{ $travel_package->location }}</h3>
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
@endif
  </div>
  </div>
</section>

<script>
document.getElementById('searchButton').addEventListener('click', function(e) {
  e.preventDefault(); // Mencegah aksi default jika ada
  const target = document.getElementById('targetContent');
  if (!target) return; // Pastikan elemen target ada

  const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
  const startPosition = window.pageYOffset;
  const distance = targetPosition - startPosition;
  const duration = 1000; // Durasi dalam milidetik (misalnya, 1000 ms = 1 detik)
  let startTime;

  // Fungsi easing 'ease-in'
  function easeIn(t) {
    return t * t; // Fungsi kuadrat
  }

  function scrollAnimation(currentTime) {
    if (!startTime) startTime = currentTime;
    const timeElapsed = currentTime - startTime;
    const progress = Math.min(timeElapsed / duration, 1); // Progress antara 0 dan 1

    // Hitung posisi scroll dengan efek easing
    const easedProgress = easeIn(progress);

    window.scrollTo(0, startPosition + distance * easedProgress);

    if (timeElapsed < duration) {
      requestAnimationFrame(scrollAnimation);
    }
  }

  requestAnimationFrame(scrollAnimation);
});



</script>

@endsection