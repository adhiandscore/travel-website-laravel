<?php

namespace App\Helpers;

class TopsisHelper
{
    public static function calculateTopsisScore($data, $weights)
    {
        $normalizedData = [];
        $idealBest = [];
        $idealWorst = [];

        foreach ($data as $criteria => $values) {
            // Hitung sum of squares
            $sumOfSquares = array_sum(array_map(fn($value) => $value ** 2, $values));
            
            // Jika sumOfSquares = 0, tambahkan nilai 1 agar tidak terjadi pembagian nol
            $sqrtSum = $sumOfSquares == 0 ? 1 : sqrt($sumOfSquares);

            // Normalisasi dan bobot
            $normalizedData[$criteria] = array_map(function ($value) use ($sqrtSum, $weights, $criteria) {
                return ($value / $sqrtSum) * $weights[$criteria];
            }, $values);

            // Tentukan ideal best dan ideal worst
            $idealBest[$criteria] = max($normalizedData[$criteria]);
            $idealWorst[$criteria] = min($normalizedData[$criteria]);
        }

        // Hitung jarak ke ideal best dan ideal worst
        $scores = [];
        foreach (array_keys($data['price']) as $index) {
            $distanceToBest = 0;
            $distanceToWorst = 0;

            foreach ($data as $criteria => $values) {
                $distanceToBest += ($normalizedData[$criteria][$index] - $idealBest[$criteria]) ** 2;
                $distanceToWorst += ($normalizedData[$criteria][$index] - $idealWorst[$criteria]) ** 2;
            }

            $distanceToBest = sqrt($distanceToBest);
            $distanceToWorst = sqrt($distanceToWorst);

            // Tangani pembagian dengan nol (jika jarak total = 0)
            $totalDistance = $distanceToBest + $distanceToWorst;
            $totalDistance = $totalDistance == 0 ? 1 : $totalDistance;

            // Hitung skor
            $scores[] = $distanceToWorst / $totalDistance;
        }

        return $scores;
    }
}
