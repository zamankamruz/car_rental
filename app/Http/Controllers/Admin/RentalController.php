<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    // List all rentals
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    // Show details for a rental
    public function show(Rental $rental)
    {
        return view('admin.rentals.show', compact('rental'));
    }

    // Update rental status or details
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $rental->update($request->only('status'));

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }

    // Delete a rental record
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
