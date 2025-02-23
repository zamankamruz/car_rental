<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'availability', 'image',
    ];

    // A car can have many rentals
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
