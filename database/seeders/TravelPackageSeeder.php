<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data untuk dimasukkan ke tabel travel_packages
        DB::table('travel_packages')->insert([
            [
                'type' => 'Paket Wisata Bali',
                'slug' => Str::slug('Paket Wisata Bali'),
                'location' => 'Bali',
                'destination' => 'Pantai Kuta, Ubud, Tanah Lot',
                'facility' => json_encode(['Karaoke', 'Bus AC', 'WiFi', 'Tour Guide']),
                'acomodation' => json_encode(['Hotel Bintang 4', 'Penginapan Deluxe']),
                'consumption' => '3 Meals/Day',
                'souvenir' => 'T-Shirt, Keychain',
                'documentation' => 'Foto dan Video',
                'seat_capacity' => 20,
                'bonus' => 'Free Spa',
                'duration' => '5 Hari 4 Malam',
                'price' => 5000000.00,
                'description' => 'Paket wisata lengkap dengan fasilitas terbaik di Bali.',
                'rating' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Paket Wisata Jakarta',
                'slug' => Str::slug('Paket Wisata Jakarta'),
                'location' => 'Jakarta',
                'destination' => 'Monas, Ancol, Kota Tua',
                'facility' => json_encode(['Karaoke', 'AC Bus', 'VCD', 'Guide']),
                'acomodation' => json_encode(['Hotel Bintang 3', 'Penginapan Standard']),
                'consumption' => '3 Meals/Day',
                'souvenir' => 'T-Shirt, Mug',
                'documentation' => 'Foto dan Video',
                'seat_capacity' => 30,
                'bonus' => 'Free Tiket',
                'duration' => '2 Hari 1 Malam',
                'price' => 2500000.00,
                'description' => 'Wisata Jakarta dengan pilihan paket hemat.',
                'rating' => 4.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan lebih banyak data jika diperlukan
        ]);
    }
}
