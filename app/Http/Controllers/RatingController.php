<?php

namespace App\Http\Controllers;

use App\Models\Rating; 
use App\Models\TravelPackage; 
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'travel_package_id' => 'required|exists:travel_packages,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Simpan data ke tabel 'ratings'
        Rating::create([
            'travel_package_id' => $request->travel_package_id,
            'rating' => $request->rating,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Rating berhasil dikirim!');
    }
}
