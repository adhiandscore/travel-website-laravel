<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use App\Helpers\TopsisHelper;

class TopsisController extends Controller
{
    public function showFavorites()
    {
        // Ambil data travel package
        $travelPackages = TravelPackage::all();

        // Handle jika data kosong
        if ($travelPackages->isEmpty()) {
            return view('favorites', ['packages' => collect(), 'message' => 'No travel packages available.']);
        }

        // Persiapkan data untuk TOPSIS
        $data = [
            'price' => $travelPackages->pluck('price')->toArray(),
            'rating' => $travelPackages->pluck('rating')->toArray(),
            'facility_count' => $travelPackages->pluck('facility_count')->toArray(),
            'duration_in_days' => $travelPackages->pluck('duration_in_days')->toArray(),
            'seat_capacity' => $travelPackages->pluck('seat_capacity')->toArray(),
        ];

        // Bobot kriteria
        $weights = [
            'price' => -0.3,
            'rating' => 0.3,
            'facility_count' => 0.2,
            'duration_in_days' => -0.15,
            'seat_capacity' => 0.1,
        ];

        // Hitung nilai TOPSIS
        $topsisScores = TopsisHelper::calculateTopsisScore($data, $weights);

        // Gabungkan skor ke setiap paket dan urutkan berdasarkan skor
        $rankedPackages = $travelPackages->map(function ($package, $index) use ($topsisScores) {
            $package->score = $topsisScores[$index];
            return $package;
        })->sortByDesc('score');

        // Return ke view
        return view('favorites', ['packages' => $rankedPackages]);
    }
}
