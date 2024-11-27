<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['travel_package_id', 'rating'];

    public function travelPackage() {
        return $this->belongsTo(TravelPackage::class);
    }
}