<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Tambahkan kolom yang bisa diisi ke dalam fillable
    protected $fillable = [
        'rating', // Kolom rating yang diinputkan
        'travel_package_id', // Kolom travel_package_id yang perlu diisi
        // tambahkan kolom lain yang relevan jika diperlukan
    ];

    // Tambahkan relasi ke model Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Method untuk menghitung rata-rata rating
    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0; // Jika tidak ada rating, default 0
    }
}