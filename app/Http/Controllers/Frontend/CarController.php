<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // Display available cars with filtering options
    public function index(Request $request)
    {
        $query = Car::query()->where('availability', true);

        // Filtering by car type, brand, or daily price
        if ($request->has('car_type')) {
            $query->where('car_type', $request->car_type);
        }
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->has('daily_rent_price')) {
            $query->where('daily_rent_price', '<=', $request->daily_rent_price);
        }

        $cars = $query->get();

        return view('frontend.cars.index', compact('cars'));
    }

    // Show details of a specific car
    public function show(Car $car)
    {
        return view('frontend.cars.show', compact('car'));
    }
}
