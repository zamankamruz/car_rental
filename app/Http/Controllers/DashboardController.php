<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('availability', true)->count();
        $totalRentals = Rental::count();
        $totalEarnings = Rental::sum('total_cost');

        return view('admin.dashboard' , compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }


    public function profile()
    {
        $user = Auth::user();

        return view('user.Profile.profile', compact('user'));
    }


    public function password()
    {
        $user = Auth::user();
 
        return view('user.Profile.password',compact('user'));
    }


    public function user_dashboard()
    {
        $user = Auth::user();
        $rentals = Rental::where('user_id', $user->id)->with('car')->get();

        return view('user.dashboard', compact('user', 'rentals'));
    }

    // Update Profile Information
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
