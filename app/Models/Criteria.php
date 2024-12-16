<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'is_benefit',
    ];

    public function criteria_values()
    {
        return $this->hasMany(CriteriaValue::class);
    }

}
