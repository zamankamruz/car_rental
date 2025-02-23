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
    max-width: 700px;
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

/* Card Styling */
.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.card p {
    font-size: 14px;
    color: #555;
    margin-bottom: 8px;
}

.card p strong {
    color: #333;
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

/* Form Styling */
.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-size: 14px;
    font-weight: 500;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 6px;
    transition: 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
    outline: none;
}

/* Submit Button */
.btn-submit {
    width: 100%;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 12px;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-submit:hover {
    background-color: #0056b3;
}

/* Responsive */
@media (max-width: 480px) {
    .container {
        width: 90%;
        padding: 15px;
    }
}
</style>

<div class="container">
    
    <!-- Page Header -->
    <h1>Rental Details</h1>

    <!-- Rental Information Card -->
    <div class="card">
        <h4>Rental ID: {{ $rental->id }}</h4>
        <p><strong>Customer:</strong> {{ $rental->user->name }} ({{ $rental->user->email }})</p>
        <p><strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})</p>
        <p><strong>Rental Period:</strong> {{ $rental->start_date }} to {{ $rental->end_date }}</p>
        <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
        <p><strong>Status:</strong> 
            <span class="badge 
                {{ $rental->status == 'ongoing' ? 'badge-ongoing' : 
                   ($rental->status == 'completed' ? 'badge-completed' : 'badge-canceled') }}">
                {{ ucfirst($rental->status) }}
            </span>
        </p>
    </div>

    <hr>

    <!-- Update Rental Status Form -->
    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="status">Update Status</label>
            <select name="status" class="form-control">
                <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $rental->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Update Rental</button>
    </form>

</div>

@endsection
