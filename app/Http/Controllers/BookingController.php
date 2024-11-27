<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
{
    // Buat booking dengan data dari permintaan
    Booking::create($request->validated());

    return redirect()->back()->with([
        'message' => "Success, we'll process your booking"
    ]);
}
}
