<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmation;

class RentalController extends Controller
{
    // Show form to book a car
    public function create(Car $car)
    {
        return view('frontend.rentals.create', compact('car'));
    }

    // Process car booking
    public function store(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        // Check car availability for the period (you might add more robust logic)
        if (!$car->availability) {
            return redirect()->back()->with('error', 'This car is not available.');
        }

        // Calculate total cost based on rental days
        $start = \Carbon\Carbon::parse($request->start_date);
        $end   = \Carbon\Carbon::parse($request->end_date);
        $days  = $start->diffInDays($end) + 1; // include both start and end dates
        $totalCost = $days * $car->daily_rent_price;

        $rental = Rental::create([
            'user_id'    => Auth::id(),
            'car_id'     => $car->id,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_cost' => $totalCost,
            'status'     => 'ongoing',
        ]);

        // Update car availability if needed
        $car->update(['availability' => false]);

        // Send emails to customer and admin
        Mail::to(Auth::user()->email)->send(new RentalConfirmation($rental));
        Mail::to(config('mail.from.address'))->send(new RentalConfirmation($rental, true));

        return redirect()->route('frontend.rentals.index')->with('success', 'Car booked successfully.');
    }

    // List current and past bookings for a logged-in user
    public function index()
    {
        $rentals = Auth::user()->rentals()->with('car')->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    // Allow cancellation of a booking (if rental not started yet)
    public function cancel(Rental $rental)
    {
        // Ensure the rental belongs to the authenticated user and rental start date is in future
        if ($rental->user_id != Auth::id() || now()->gte(\Carbon\Carbon::parse($rental->start_date))) {
            return redirect()->back()->with('error', 'Booking cannot be canceled.');
        }

        $rental->update(['status' => 'canceled']);

        // Optionally update car availability
        $rental->car->update(['availability' => true]);

        return redirect()->back()->with('success', 'Booking canceled successfully.');
    }
}
