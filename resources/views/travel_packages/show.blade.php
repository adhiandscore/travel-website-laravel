@extends('layouts.frontend')

@section('content')

<section class="blog section py-16" id="blog">
  <div class="container mx-auto">
    <div class="package-travel">
      <div class="islands booking desc">
        <div class="islands__container flex flex-col lg:flex-row gap-8">
          <!-- Gallery Images -->
          @foreach($travel_package->galleries as $gallery)
          <div class="rounded-lg overflow-hidden shadow-md">
            <img 
              src="{{ asset('frontend/assets/img/bali.jpg') }}" 
              alt="Gallery Image" 
              class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105" 
            />
          </div>
          @endforeach

          <!-- Islands Data -->
          <div class="text-left lg:text-left">
            <h2 class="text-lg text-secondary font-semibold">Explore</h2>
            <h1 class="text-3xl font-bold text-gray-800">
              {{ $travel_package->location }} Paket {{ $travel_package->level }}
            </h1>
            <p class="mt-4 text-gray-600">{{ $travel_package->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="contact-form py-16 bg-gray-50">
  <h2 class="form-title text-2xl font-bold text-center">Booking Sekarang</h2>
  <form action="{{ route('booking.store') }}" method="POST" class="mt-8 max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    @csrf
    <div class="form-row grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="form-group">
        <label for="name" class="block text-gray-700">Nama</label>
        <input type="text" name="name" class="form-control mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-secondary" required />
      </div>
      <div class="form-group">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" class="form-control mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-secondary" required />
      </div>
    </div>
    <div class="form-row grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
      <div class="form-group">
        <label for="number_phone" class="block text-gray-700">No. HP</label>
        <input type="text" name="number_phone" class="form-control mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-secondary" required />
      </div>
      <div class="form-group">
        <label for="date" class="block text-gray-700">Tanggal</label>
        <input type="date" name="date" class="form-control mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-secondary" required />
      </div>
    </div>
    <div class="form-group mt-6">
      <label for="travel_package_id" class="block text-gray-700">Paket Wisata</label>
      <p class="mt-2 text-gray-600">{{ $travel_package->location }}, <span class="font-semibold">{{ $travel_package->level }}</span></p>
      <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}" />
    </div>
    <button type="submit" class="btn btn-booking w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Booking Sekarang</button>
  </form>
</div>

<section class="popular-section py-16 bg-gray-100" id="popular">
  <div class="container mx-auto">
    <span class="section__subtitle block text-center text-secondary text-lg font-semibold">Paket Perjalanan</span>
    <h2 class="section__title text-center text-3xl font-bold mt-2">Tur Terbaik untuk Anda</h2>

    <div class="popular__all grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
      @foreach($travel_packages as $travel_package)
      <article class="popular__card bg-white rounded-lg shadow-md overflow-hidden hover:scale-105 transition">
        <a href="{{ route('travel_package.show', ['travel_package' => $travel_package->id]) }}">
          <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" class="popular__img w-full object-cover h-48" alt="Gallery Image" />
          <div class="popular__data p-4">
            <h2 class="popular__price text-primary font-bold text-lg">Rp {{ number_format($travel_package->price, 2) }}</h2>
            <h3 class="popular__title mt-2 text-gray-800 text-lg font-semibold">{{ $travel_package->location }}</h3>
            <h5 class="popular__level text-gray-500 mt-1">{{ $travel_package->level }}</h5>
            <p class="popular__description text-gray-600 mt-2">{{ $travel_package->type }}</p>
            <div class="rating flex items-center mt-2 text-secondary">
              @for ($i = 1; $i <= 5; $i++)
              <i class="bx {{ $i <= $travel_package->rating ? 'bxs-star' : 'bx-star' }}"></i>
              @endfor
            </div>
          </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endsection
