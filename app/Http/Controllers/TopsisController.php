<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TravelPackage;


class TopsisController extends Controller
{
    public function getRecommendedPackages()
    {
        $user = auth()->user(); // Asumsi pengguna sudah login
        $weights = $this->getPreferencesFromBookings($user); // Mengambil bobot dari hasil booking

        if (empty($weights)) {
            // Tetapkan bobot default jika tidak ada booking
            $weights = [
                'price' => 0.5,  // Bobot untuk harga
                'rating' => 0.5  // Bobot untuk rating
            ];
        }

        

        $packages = TravelPackage::with('bookings')->get(); // Ambil semua paket beserta data booking
        $rankedPackages = $this->calculateTopsisRank($packages, $weights); // Hitung peringkat menggunakan TOPSIS

        return view('travel_packages.index', ['packages' => $rankedPackages]);
    }

    private function getPreferencesFromBookings($user)
    {
        // Ambil booking user (opsional jika data ini relevan)
        $bookings = Booking::where('user_id', $user->id)->get();
    
        // Tetapkan bobot tetap
        $weights = [
            'price' => 0.7,  // Fokus harga 50%
            'rating' => 0.3  // Fokus rating 50%
        ];
    
        // (Opsional) Jika ada booking, tambahkan logika lain di sini
        if ($bookings->count() > 0) {
            // Bisa tambahkan variasi bobot berdasarkan logika tertentu jika dibutuhkan
        }
        
        return $weights;
    }

    private function createDecisionMatrix($packages)
{
    $decisionMatrix = [];
    foreach ($packages as $package) {
        $decisionMatrix[] = [
            'price' => $package->price,   // Harga paket
            'rating' => $package->rating // Rating paket
        ];
    }
    
    return $decisionMatrix;
}

    private function normalizeMatrix($matrix)
    {
        $normalizedMatrix = [];
        foreach ($matrix as $packageData) {
            $normalizedRow = [];
            foreach ($packageData as $criterion => $value) {
                $columnValues = array_filter(array_column($matrix, $criterion));
                $minValue = min($columnValues);
                $maxValue = max($columnValues);

                $normalizedValue = ($maxValue - $minValue == 0) ? 0 : ($value - $minValue) / ($maxValue - $minValue);
                $normalizedRow[$criterion] = $normalizedValue;
            }
            $normalizedMatrix[] = $normalizedRow;
            
        }
        return $normalizedMatrix;
    }

    private function calculateWeightedNormalizedMatrix($normalizedMatrix, $weights)
{
    $weightedMatrix = [];
    foreach ($normalizedMatrix as $row) {
        $weightedRow = [];
        foreach ($row as $criteria => $value) {
            $weightedRow[$criteria] = $value * $weights[$criteria]; // Bobot dikalikan nilai normalisasi
        }
        $weightedMatrix[] = $weightedRow;
    }
    return $weightedMatrix;
    
}

private function determineIdealAndAntiIdealSolutions($weightedMatrix)
{
    $idealSolution = [];
    $antiIdealSolution = [];

    foreach (array_keys($weightedMatrix[0]) as $criteria) {
        $column = array_column($weightedMatrix, $criteria);
        if ($criteria === 'price') {
            $idealSolution[$criteria] = min($column); // Harga lebih kecil lebih ideal
            $antiIdealSolution[$criteria] = max($column); // Harga lebih besar anti-ideal
        } else {
            $idealSolution[$criteria] = max($column); // Rating lebih besar lebih ideal
            $antiIdealSolution[$criteria] = min($column); // Rating lebih kecil anti-ideal
        }
    }

    return [$idealSolution, $antiIdealSolution];
    
}

    private function calculateDistances($weightedMatrix, $idealSolution, $antiIdealSolution)
    {
        $distances = [];
        foreach ($weightedMatrix as $row) {
            $distanceToIdeal = $this->calculateEuclideanDistance($row, $idealSolution);
            $distanceToAntiIdeal = $this->calculateEuclideanDistance($row, $antiIdealSolution);
            $distances[] = [
                'distanceToIdeal' => $distanceToIdeal,
                'distanceToAntiIdeal' => $distanceToAntiIdeal,
            ];
        }
        return $distances;
    }

    private function calculateEuclideanDistance($row, $solution)
    {
        $sum = 0;
        foreach ($solution as $criterion => $value) {
            $sum += pow(($row[$criterion] - $value), 2);
        }
        return sqrt($sum);
    }

    private function calculateFinalScores($distances)
    {
        $scores = [];
        foreach ($distances as $index => $distance) {
            $scores[$index] = $distance['distanceToAntiIdeal'] /
                ($distance['distanceToIdeal'] + $distance['distanceToAntiIdeal']);
        }
        
        return $scores;
        
    }

    private function calculateTopsisRank($packages, $weights)
    {
        // Matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($packages);
    
        // Normalisasi matriks
        $normalizedMatrix = $this->normalizeMatrix($decisionMatrix);
    
        // Matriks normalisasi berbobot
        $weightedMatrix = $this->calculateWeightedNormalizedMatrix($normalizedMatrix, $weights);
    
        // Solusi ideal & anti-ideal
        list($idealSolution, $antiIdealSolution) = $this->determineIdealAndAntiIdealSolutions($weightedMatrix);
    
        // Hitung jarak ke solusi ideal & anti-ideal
        $distances = $this->calculateDistances($weightedMatrix, $idealSolution, $antiIdealSolution);
    
        // Hitung skor akhir berdasarkan jarak
        $scores = $this->calculateFinalScores($distances);
    
        // Tambahkan skor ke paket dan urutkan
        return $packages->map(function ($package, $index) use ($scores) {
            $package->topsis_score = $scores[$index];
            
            return $package;
        })->sortByDesc('topsis_score'); // Urutkan berdasarkan skor
        

    }
    
}

 