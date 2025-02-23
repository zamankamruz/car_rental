<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // Display a list of cars
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Show form to create a new car
    public function create()
    {
        return view('admin.cars.create');
    }

    // Store new car
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images/cars'), $imageName);
            $data['image'] = $imageName;
        }

        Car::create($data);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    // Show form to edit a car
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    // Update car details
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images/cars'), $imageName);
            $data['image'] = $imageName;
        }

        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
