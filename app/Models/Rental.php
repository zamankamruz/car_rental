<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id', 'car_id', 'start_date', 'end_date', 'total_cost', 'status',
    ];

    // Rental belongs to a car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Rental belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
