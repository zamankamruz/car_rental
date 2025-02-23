@extends('admin.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container */
.container {
    max-width: 800px;
    margin: 30px auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
}

/* Header */
h1 {
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

/* Customer Info Card */
.customer-info {
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.customer-info p {
    font-size: 14px;
    color: #555;
    margin-bottom: 8px;
}

.customer-info p strong {
    color: #333;
}

/* Responsive Table Wrapper */
.table-responsive {
    overflow-x: auto;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table thead {
    background: #007bff;
    color: white;
}

.table thead th {
    padding: 10px;
    font-size: 14px;
    text-align: left;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
    transition: background 0.3s ease;
}

.table tbody tr:hover {
    background: #f1f1f1;
}

.table tbody td {
    padding: 10px;
    font-size: 13px;
    color: #555;
    vertical-align: middle;
}

/* Status Badge */
.badge {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
}

.badge-ongoing {
    background: #ffc107;
    color: #333;
}

.badge-completed {
    background: #28a745;
    color: white;
}

.badge-canceled {
    background: #dc3545;
    color: white;
}

/* Back Button */
.btn-back {
    display: block;
    width: 100%;
    text-align: center;
    background-color: #6c757d;
    color: white;
    font-size: 14px;
    padding: 10px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.btn-back:hover {
    background-color: #545b62;
}

/* Responsive */
@media (max-width: 600px) {
    .container {
        width: 90%;
        padding: 15px;
    }
}
</style>

<div class="container">
    
    <!-- Page Header -->
    <h1>Rental History of {{ $customer->name }}</h1>

    <!-- Customer Information Card -->
    <div class="customer-info">
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}</p>
        <p><strong>Address:</strong> {{ $customer->address ?? 'N/A' }}</p>
    </div>

    @if($rentals->isEmpty())
        <p style="text-align: center; color: #777;">This customer has not rented any cars yet.</p>
    @else
        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Car</th>
                        <th>Rental Period</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                        <tr>
                            <td data-label="Car">{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                            <td data-label="Rental Period">{{ $rental->start_date }} to {{ $rental->end_date }}</td>
                            <td data-label="Total Cost">${{ number_format($rental->total_cost, 2) }}</td>
                            <td data-label="Status">
                                <span class="badge 
                                    {{ $rental->status == 'ongoing' ? 'badge-ongoing' : 
                                       ($rental->status == 'completed' ? 'badge-completed' : 'badge-canceled') }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Back to Customers Button -->
    <a href="{{ route('admin.customers.index') }}" class="btn-back">Back to Customers</a>

</div>

@endsection
``
