<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use Illuminate\Support\Facades\Storage;

class TravelPackageController extends Controller
{
    public function index(Request $request)
    {
        // Memeriksa apakah ada query pencarian
        $search = $request->input('search');

        // Jika ada query pencarian, filter data paket wisata
        if ($search) {
            $travel_packages = TravelPackage::with('galleries')
                ->where('location', 'like', '%' . $search . '%')
                ->orWhere('type', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->get();
        } else {
            // Jika tidak ada query pencarian, tampilkan semua paket wisata
            $travel_packages = TravelPackage::with('galleries')->get();
        }

        // Mengembalikan view dengan data yang telah difilter
        return view('travel_packages.index', compact('travel_packages'));
    }

    public function show(TravelPackage $travel_package)
    {
        $travel_packages = TravelPackage::where('id', '!=', $travel_package->id)->get();

        return view('travel_packages.show', compact('travel_package', 'travel_packages'));
    }

    public function rate(Request $request, $id) {
        // Validasi input
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);
 
        // Temukan travel package berdasarkan ID
        $travelPackage = TravelPackage::find($id);
        if ($travelPackage) {
            // Update rating
            $travelPackage->rating = $request->input('rating');
            $travelPackage->save();
 
            return redirect()->back()->with('message', 'Rating berhasil disimpan!');
        }
 
        return redirect()->back()->with('error', 'Travel package tidak ditemukan.');
    }


}
