<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Helpers\TopsisHelper;
use Illuminate\Support\Facades\Storage;

class TravelPackageController extends Controller
{
    public function search(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'destination' => 'nullable|string|',
            'facility' => 'nullable|string', // JSON string; validation should handle specific formatting elsewhere if necessary
            'acomodation' => 'nullable|string', // JSON string; validation should handle specific formatting elsewhere if necessary
            'consumption' => 'nullable|string',
            'souvenir' => 'nullable|string',
            'documentation' => 'nullable|string',
            'price' => 'nullable|string',
            'duration' => 'nullable|string|min:1',
            'price_min' => 'nullable|integer|min:0', // Minimum price for filtering
            'price_max' => 'nullable|integer|min:0', // Maximum price for filtering
            'seat_capacity' => 'nullable|string|min:1',
            'bonus' => 'nullable|string',
        ]);

        // Query dasar untuk TravelPackage
        $query = TravelPackage::query();

        // Tambahkan filter berdasarkan input yang tersedia
        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('destination')) {
            $query->where('destination', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('duration')) {
            $query->where('duration', '=', $request->duration);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('seat')) {
            $query->where('seat', '>=', $request->seat);
        }

        if ($request->filled('bonus')) {
            $query->where('bonus', 'like', '%' . $request->bonus . '%');
        }

        // Ambil hasil query
        $travelPackages = $query->with('galleries')->get();

        // Format respons JSON
        return response()->json($travelPackages->map(function ($travelPackage) {
            return [
                'id' => $travelPackage->id,
                'image' => $travelPackage->galleries->isNotEmpty()
                    ? Storage::url($travelPackage->galleries->first()->images)
                    : null, // Fallback jika tidak ada gambar
                'price' => $travelPackage->price,
                'location' => $travelPackage->location,

                'type' => $travelPackage->type,
                'rating' => $travelPackage->rating ?? 0, // Fallback jika rating null
                'description' => $travelPackage->description,
            ];
        }));
    }


    public function index(Request $request)
    {
        // Tangkap filter dari request
        $location = $request->input('location');
        $date = $request->input('date');
        $people = $request->input('people');

        // Query dasar
        $query = TravelPackage::query();

        // Filter lokasi
        if ($location) {
            $query->where('location', $location);
        }

        // Data tambahan (misalnya lokasi unik untuk dropdown)
        $locations = TravelPackage::select('location')->distinct()->pluck('location');

        // Ambil hasil query
        $travelPackages = $query->get();

        // Handle jika data kosong
        if ($travelPackages->isEmpty()) {
            return view('travel_packages.index', [
                'travel_packages' => collect(),
                'locations' => $locations,
                'message' => 'No travel packages available.'
            ]);
        }

        // Persiapkan data untuk TOPSIS
        $data = [
            'price' => $travelPackages->pluck('price')->map(fn($value) => is_numeric($value) ? $value : 1)->toArray(),
            'rating' => $travelPackages->pluck('rating')->map(fn($value) => is_numeric($value) ? $value : 1)->toArray(),
            'facility_count' => $travelPackages->pluck('facility_count')->map(fn($value) => is_numeric($value) ? $value : 1)->toArray(),
            'duration_in_days' => $travelPackages->pluck('duration_in_days')->map(fn($value) => is_numeric($value) ? $value : 1)->toArray(),
            'seat_capacity' => $travelPackages->pluck('seat_capacity')->map(fn($value) => is_numeric($value) ? $value : 1)->toArray(),
        ];


        // Bobot kriteria
        $weights = [
            'price' => -0.3,
            'rating' => 0.25,
            'facility_count' => 0.2,
            'duration_in_days' => -0.15,
            'seat_capacity' => 0.1,
        ];

        // Hitung nilai TOPSIS
        $topsisScores = \App\Helpers\TopsisHelper::calculateTopsisScore($data, $weights);

        // Gabungkan skor ke setiap paket dan urutkan berdasarkan skor
        $rankedPackages = $travelPackages->map(function ($package, $index) use ($topsisScores) {
            $package->score = $topsisScores[$index];
            return $package;
        })->sortByDesc('score');

        $travelPackages = TravelPackage::with('ratings')->get();

        // Tambahkan rata-rata rating ke setiap paket travel
        $travelPackages->each(function ($package) {
            $package->average_rating = round($package->averageRating() ?? 0, 1); // Jika null, fallback ke 0
        });
        

        // Return ke view dengan data yang benar
        return view(
            'travel_packages.index',
            [
                'travel_packages' => $travelPackages,
                'ranked_packages' => $rankedPackages, // Pastikan ini benar
                'locations' => $locations,
                'message' => null
            ]
        );
    }



    public function show(TravelPackage $travel_package, Request $request)
    {
        // Ambil travel packages lain yang berbeda dari yang sedang ditampilkan
        $related_travel_packages = TravelPackage::where('id', '!=', $travel_package->id)->take(5)->get();

        // Ambil data travel package berdasarkan ID
        $travelPackage = TravelPackage::with('galleries')->findOrFail($travel_package->id);

        // Tangkap data filter
        $date = $request->input('date');
        $people = $request->input('people');


        return view('travel_packages.show', compact('travel_package', 'related_travel_packages', 'date', 'people'));
    }

    public function rate(Request $request, $id)
    {
        // Validasi input rating
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        // Temukan travel package berdasarkan ID
        $travelPackage = TravelPackage::findOrFail($id);

        // Simpan rating ke tabel ratings
        \App\Models\Rating::create([
            'travel_package_id' => $travelPackage->id,
            'rating' => $validated['rating'],
        ]);

        return redirect()->back()->with('message', 'Rating berhasil disimpan!');
    }




}
