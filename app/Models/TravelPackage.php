<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;

    // guarded & fillable adalah atribut laravel untuk mengizinkan dan melarang kolom mana yang bisa diisi
    // fillable : diizinkan untuk disii
    // protected : tidak diizinkan untuk diisi

    protected $guarded = ['id'];
    protected $fillable = ['type', 'level', 'slug', 'location', 'facility', 'duration', 'price', 'description', 'rating'];

    // atribut untuk perhitungan TOPSIS dimulai disini
    protected $normalized_price;
    protected $normalized_location_score;
    protected $normalized_type_score;

    
    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function bookings()
{
    return $this->hasMany(Booking::class);
}

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
