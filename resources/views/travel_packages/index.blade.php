@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->

    <section class="relative bg-cover bg-center"
        style="background-image: url('{{ asset('frontend/assets/img/bali.jpg') }}'); height: 650px;">
        <!-- Card Container -->
        <div class="bg-dark bg-opacity-10 p-12 ">
            <div class="container mx-auto px-4 py-8 mt-20">
                <!-- Judul Section -->
                <h2 class="text-2xl font-bold text-white mb-6">Cari berdasarkan tempat wisata</h2>

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6" id="searchPackage">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="https://i.pinimg.com/236x/70/02/53/70025309d0640441696b36954b45784e.jpg" alt="bali"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-black-500 text-center">Bali</h3>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="https://i.pinimg.com/236x/46/e2/31/46e231b15a0fbca302f34e57d4799026.jpg" alt="jakarta"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-black-500 text-center">Jakarta</h3>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="https://i.pinimg.com/736x/0a/91/86/0a91861920cc71bde62d951cafe8bf0a.jpg" alt="jawa timur"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-black-500 text-center">Jawa Timur</h3>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="https://i.pinimg.com/736x/76/31/49/763149d65bfa032171ed7d22f0849dcc.jpg" alt="lombok"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-black-500 text-center">Lombok</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="container">
        <div class="card card border-0" id="targetContent">
            <!-- Form Pencarian yang sudah ada -->
            <div class="bg-blue-500 p-9 rounded-lg ">

                <!-- Form tambahan di bawahnya -->
                <form action="{{ route('travel_packages.index') }}" method="GET">
                    <div class="grid grid-cols-4 gap-4">
                        <!-- Pencarian Lokasi -->
                        <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                            <label for="location" class="text-gray-700 font-semibold mb-1">Pencarian Lokasi</label>
                            <select id="location" name="location"
                                class="border-gray-300 border rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="" selected>Semua Lokasi</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}"
                                        {{ request('location') == $location ? 'selected' : '' }}>
                                        {{ $location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tentukan Tanggal -->
                        <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                            <label for="date" class="text-gray-700 font-semibold mb-2">Tentukan Tanggal</label>
                            <input type="date" id="date" name="date" value="{{ request('date') }}"
                                class="border-gray-300 border rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" />
                        </div>

                        <!-- Berapa Banyak Orang -->
                        <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                            <label for="people" class="text-gray-700 font-bold mb-2">Berapa Banyak Orang</label>
                            <input type="number" id="people" name="people" min="1"
                                value="{{ request('people') }}"
                                class="border-gray-300 border rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500"
                                placeholder="Jumlah orang" />
                        </div>

                        <!-- Tombol Cari -->
                        <div class="p-4 rounded-lg shadow-lg flex justify-center items-center">
                            <button id="searchPackage"
                                class="bg-green-500 text-white py-2 px-6 rounded-lg font-bold hover:bg-green-600">
                                Cari!
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- Tombol Cari -->
        </div>
    </div>

    </div>


    <!--==================== FAVORIT ====================-->

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Paket Travel</h2>
    
        @if(isset($message))
            <p class="text-gray-500">{{ $message }}</p>
        @else
            <!-- Rekomendasi Berdasarkan TOPSIS -->
            <div class="container mx-auto px-4 py-8">
                <!-- Judul Section -->
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Favorit Berdasarkan Rekomendasi</h2>
            
                <!-- Grid Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                    @foreach($ranked_packages as $package)
                        <article class="popular__card border rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
                            <a href="{{ route('travel_package.show', ['id' => $package->id, 'date' => request('date'), 'people' => request('people')]) }}">
                                <img src="{{ Storage::url($package->galleries->first()->images) }}"
                                    class="popular__img w-full h-48 object-cover" alt="{{ $package->location }}" />
                                <div class="popular__data p-4">
                                    <h2 class="popular__price text-lg font-semibold text-gray-800 mb-1">
                                        <span>Rp &nbsp;</span>{{ number_format($package->price, 2, '.') }}
                                    </h2>
                                    <p>Harga per orang</p>
                                    <h3 class="popular__title text-xl font-bold text-gray-800">
                                        {{ $package->location }}
                                    </h3>
            
                                    <p class="popular__description text-sm text-gray-500 mb-3">{{ $package->type }}</p>
                                    <div class="rating flex gap-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="bx {{ $i < $package->average_rating ? 'bxs-star' : 'bx-star' }}" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            
    
            <!-- Semua Paket Travel -->
            <h3 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Semua Paket Travel</h3>
            <div class="container mx-auto px-4 py-8">
                <!-- Judul Section -->
            
                <!-- Grid Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                    @foreach($ranked_packages as $package)
                        <article class="popular__card border rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
                            <a href="{{ route('travel_package.show', ['id' => $package->id, 'date' => request('date'), 'people' => request('people')]) }}">
                                <img src="{{ Storage::url($package->galleries->first()->images) }}"
                                    class="popular__img w-full h-48 object-cover" alt="{{ $package->location }}" />
                                <div class="popular__data p-4">
                                    <h2 class="popular__price text-lg font-semibold text-gray-800 mb-1">
                                        <span>Rp &nbsp;</span>{{ number_format($package->price, 2, '.') }}
                                    </h2>
                                    <p>Harga per orang</p>
                                    <h3 class="popular__title text-xl font-bold text-gray-800">
                                        {{ $package->location }}
                                    </h3>
            
                                    <p class="popular__description text-sm text-gray-500 mb-3">{{ $package->type }}</p>
                                    <div class="rating flex gap-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="bx {{ $i < $package->average_rating ? 'bxs-star' : 'bx-star' }}" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            
        @endif
    </div>
    
    
    
  <!--==================== BIASA ====================-->

    <section class="section mx-auto px-4 py-8" id="popular">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Lihat juga paket lainnya</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4">
            @foreach ($travel_packages as $travel_package)
                <article
                    class="popular__card border rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
                    <a
                        href="{{ route('travel_package.show', ['id' => $travel_package->id, 'date' => request('date'), 'people' => request('people')]) }}">
                        <img src="{{ Storage::url($travel_package->galleries->first()->images) }}"
                            class="popular__img w-full h-48 object-cover" alt="" />
                        <div class="popular__data p-4">
                            <h2 class="popular__price text-lg font-semibold text-gray-800 mb-1">
                                <span>Rp &nbsp;</span>{{ number_format($travel_package->price, 2, '.') }}
                            </h2>
                            <p>Harga per orang</p>
                            <h3 class="popular__title text-xl font-bold text-gray-800">
                                {{ $travel_package->location }}
                            </h3>

                            <p class="popular__description text-sm text-gray-500 mb-3">{{ $travel_package->type }}</p>
                            <div class="rating flex gap-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="bx {{ $i < $package->average_rating ? 'bxs-star' : 'bx-star' }}" aria-hidden="true"></i>
                                @endfor
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <script>
        document.getElementById('searchPackage').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default jika ada
            const target = document.getElementById('targetContent');
            if (!target) return; // Pastikan elemen target ada

            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - (window.innerHeight /
                2) + (target.offsetHeight / 2);
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            const duration = 300; // Durasi dalam milidetik (misalnya, 1000 ms = 1 detik)
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
