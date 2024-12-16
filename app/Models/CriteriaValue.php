<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaValue extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi
    protected $fillable = [
        'travel_package_id',
        'criteria_id',
        'value',
    ];

    /**
     * Relasi dengan model TravelPackage
     * Setiap nilai kriteria terhubung ke satu paket wisata
     */
    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class);
    }

    /**
     * Relasi dengan model Criteria
     * Setiap nilai kriteria terhubung ke satu kriteria
     */
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
