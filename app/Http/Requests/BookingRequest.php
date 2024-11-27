<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number_phone' => 'required|string|max:15', // Tambahkan nomor telepon
            'date' => 'required|date', // Tambahkan tanggal
            'travel_package_id' => 'required|exists:travel_packages,id', // ID paket wisata
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ];
    }

    public function authorize()
    {
        return true; // Pastikan untuk mengatur ini sesuai dengan kebutuhan otorisasi Anda
    }
}
