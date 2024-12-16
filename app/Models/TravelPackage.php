<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk diisi (mass assignment).
     */
    protected $fillable = [
        'type',
        'slug',
        'location',
        'destination',
        'facility',
        'acomodation',
        'consumption',
        'souvenir',
        'documentation',
        'seat_capacity',
        'bonus',
        'duration',
        'price',
        'description',
        'rating',
    ];

    protected $appends = ['average_rating'];

    /**
     * Relasi ke model Rating.
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'travel_package_id');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating'); // Hitung rata-rata dari kolom 'rating'
    }
    /**
     * Relasi ke model Booking.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Relasi ke model Gallery.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Relasi ke model CriteriaValue.
     */
    public function criteria_values()
    {
        return $this->hasMany(CriteriaValue::class);
    }


    /**
     * Accessor untuk rating rata-rata dari relasi ratings.
     */
    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }

    /**
     * Scope untuk pencarian berdasarkan lokasi, tipe, atau harga.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('location', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%');
    }
}
