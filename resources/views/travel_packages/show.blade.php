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
        <img src="{{ asset('frontend/assets/img/bali.jpg') }}" alt="Gallery Image"
          class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105" />
        </div>
      @endforeach

          <!-- Islands Data -->
          <div class="text-left lg:text-left">
            <h2 class="text-lg text-secondary font-semibold">Explore</h2>
            <h1 class="text-3xl font-bold text-gray-800">
              {{ $travel_package->location }} Paket {{ $travel_package->level }}
            </h1>
            <p class="mt-4 text-gray-600">{{ $travel_package->description }}</p>
            <div class="max-w-md mx-auto mt-8 p-4 bg-white border rounded-lg shadow-md">
              <h2 class="text-lg font-semibold mb-2">Superior Room Only</h2>
              <p class="text-sm text-gray-500 mb-4">Price for: 1 night, 2 adults, 1 child</p>
      
              <div class="mb-4">
                <p class="font-medium">Beds: 2 single beds or 1 extra-large double bed</p>
              </div>
      
              <ul class="text-sm space-y-2">
                <li class="flex items-center text-green-600">
                  <span
                    class="inline-flex items-center justify-center w-5 h-5 mr-2 bg-green-200 rounded-full text-white">✔</span>
                  Free stay for your child
                </li>
                <li class="flex items-center text-green-600">
                  <span
                    class="inline-flex items-center justify-center w-5 h-5 mr-2 bg-green-200 rounded-full text-white">✔</span>
                  <span>Free cancellation before 8 December 2024</span>
                </li>
                <li class="flex items-center text-green-600">
                  <span
                    class="inline-flex items-center justify-center w-5 h-5 mr-2 bg-green-200 rounded-full text-white">✔</span>
                  <span>No prepayment needed – pay at the property</span>
                </li>
                <li class="flex items-center text-gray-500">
                  <span
                    class="inline-flex items-center justify-center w-5 h-5 mr-2 bg-gray-200 rounded-full text-white">✔</span>
                  <span>Breakfast Rp 90,000 (optional)</span>
                </li>
              </ul>
      
              <div class="mt-4 border-t pt-4 flex justify-between items-center">
                <p class="text-sm text-gray-700">Only 2 rooms left on our site</p>
                <p class="text-lg font-semibold text-red-600">Rp 656,100 <span class="line-through text-gray-500">Rp
                    810,000</span></p>
              </div>
      
              <button
                class="mt-4 w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Reserve</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





</section>



<section class="popular-section py-16 bg-gray-100" id="popular">
  <div class="container mx-auto">
    <span class="section__subtitle block text-center text-secondary text-lg font-semibold">Paket Perjalanan</span>
    <h2 class="section__title text-center text-3xl font-bold mt-2">Tur Terbaik untuk Anda</h2>

    <div class="popular__all grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
      @foreach($travel_packages as $travel_package)
      <article class="popular__card bg-white rounded-lg shadow-md overflow-hidden hover:scale-105 transition">
      <a href="{{ route('travel_package.show', ['travel_package' => $travel_package->id]) }}">
        <img src="{{ Storage::url($travel_package->galleries->first()->images) }}"
        class="popular__img w-full object-cover h-48" alt="Gallery Image" />
        <div class="popular__data p-4">
        <h2 class="popular__price text-primary font-bold text-lg">Rp {{ number_format($travel_package->price, 2) }}
        </h2>
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