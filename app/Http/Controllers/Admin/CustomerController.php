<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;


class CustomerController extends Controller
{
    // List all customers
    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    // Show details for a customer
    public function show(User $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Update customer details
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $customer->update($request->all());
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }


        // Display rental history for a specific customer
        public function rentalHistory(User $customer)
        {
            $rentals = Rental::where('user_id', $customer->id)->with('car')->get();
            return view('admin.customers.rental_history', compact('customer', 'rentals'));
        }



    // Delete a customer
    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
