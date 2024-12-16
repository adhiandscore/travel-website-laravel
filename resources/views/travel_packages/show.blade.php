@extends('layouts.frontend-no-footer')

@section('content')
<section class="blog section" id="blog">
    <div class="container mx-auto">
        <div class="package-travel overflow-visible mb-96 ">
            <div class="islands booking desc">
                <div class="islands__container flex flex-col lg:flex-column">
                    <!-- Gallery Images -->
                    <!-- Islands Data -->
                    <div class="container mx-auto sm:w-full md:w-3/4 lg:w-2/3">
                        <div class="content-wrapper bg-white rounded-lg shadow-md p-6">
                            @foreach ($travel_package->galleries as $gallery)
                            <div class="rounded-lg overflow-hidden shadow-md mb-5">
                                <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" 
                                     alt="Gallery Image"
                                     class="w-full h-[400px] object-cover transition-transform hover:scale-110" />
                            </div>
                            @endforeach

                            <!-- Konten Anda -->
                            <div class="text-left">
                                <h2 class="text-lg text-secondary font-semibold">Explore</h2>
                                <h1 class="text-3xl font-bold text-gray-800">
                                    {{ $travel_package->location }} Paket {{ $travel_package->location }}
                                </h1>
                                <p class="mt-4 text-gray-600">{{ $travel_package->description }}</p>

                                <!-- Informasi Pemesanan -->
                                <div class="mt-4 p-4 bg-gray-100 border rounded-lg">
                                    <h3 class="text-lg font-bold text-gray-800">Informasi Pemesanan</h3>
                                    <p class="text-sm text-gray-600">Tanggal: 
                                        <span class="font-semibold">{{ $date ?? 'Belum Dipilih' }}</span>
                                    </p>
                                    <p class="text-sm text-gray-600">Jumlah Orang: 
                                        <span class="font-semibold">{{ $people ?? 'Belum Dipilih' }}</span>
                                    </p>
                                </div>

                                <!-- Detail Hotel -->
                                <div class="w-full mt-4 p-4 bg-white border rounded-lg shadow-md">
                                    <h2 class="text-lg font-semibold mb-2">Hotel Bintang 3</h2>
                                    <p class="text-sm text-gray-500 mb-4">Harga untuk: 1 Malam, 2 orang dewasa, 1 anak - anak</p>

                                    <div class="mb-4">
                                        <p class="font-medium">Tempat tidur: 3 tempat tidur tunggal</p>
                                    </div>

                                    <ul class="text-sm space-y-2">
                                        <li class="flex items-center text-green-600">
                                            <span class="inline-flex items-center justify-center w-5 h-5 mr-2 bg-green-200 rounded-full text-white">✔</span>
                                            <span>Bebas Pembatalan 3 hari sebelum tanggal reservasi</span>
                                        </li>
                                    </ul>

                                    <div class="mt-4 border-t pt-4 flex justify-between items-center">
                                        <p class="text-sm text-gray-700">Sisa 2 kamar di situs kami</p>
                                        <p class="text-lg font-semibold text-red-600">
                                            Rp 656,100 <span class="line-through text-gray-500">Rp 810,000</span>
                                        </p>
                                    </div>

                                    <button class="mt-4 w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                        Reserve
                                    </button>

                                    <!-- Berikan Rating -->
                                    <div class="mt-6">
                                        <h3 class="text-lg font-semibold text-gray-800">Berikan Rating</h3>
                                        <form action="{{ route('ratings.store') }}" method="POST" class="mt-4">
                                            @if (session('success'))
                                            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                                <strong class="font-bold">Sukses!</strong>
                                                <span class="block sm:inline">{{ session('success') }}</span>
                                            </div>
                                            @endif
                                            @csrf
                                            <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}">
                                            <div class="flex items-center space-x-4">
                                                <!-- Pilihan Rating -->
                                                <select name="rating" id="rating"
                                                    class="border-gray-300 border rounded-lg p-2 focus:ring-green-500">
                                                    <option value="" disabled selected>Pilih Rating</option>
                                                    <option value="1">1 - Sangat Buruk</option>
                                                    <option value="2">2 - Buruk</option>
                                                    <option value="3">3 - Cukup</option>
                                                    <option value="4">4 - Baik</option>
                                                    <option value="5">5 - Sangat Baik</option>
                                                </select>
                                                <!-- Tombol Submit -->
                                                <button type="submit"
                                                    class="bg-green-500 text-white py-2 px-6 rounded-lg font-bold hover:bg-green-600">
                                                    Kirim
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

