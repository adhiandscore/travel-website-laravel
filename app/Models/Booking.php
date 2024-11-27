<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number_phone',
        'date', 
        'travel_package_id', 
        'rating'
    ];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class);
    }
}
