@extends('frontend.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container */
.car-details-container {
    max-width: 500px;
    margin: 30px auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Car Image */
.car-image {
    width: 100%;
    max-width: 100%;
    border-radius: 12px;
    margin-bottom: 15px;
}

/* Car Info */
.car-info {
    text-align: left;
    padding: 10px 20px;
}

.car-info p {
    font-size: 16px;
    color: #555;
    margin: 5px 0;
}

.car-info p strong {
    color: #333;
}

/* Book Now Button */
.book-btn {
    display: block;
    width: 100%;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 12px;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    text-align: center;
}

.book-btn:hover {
    background-color: #0056b3;
}

/* Login Prompt */
.login-prompt {
    font-size: 16px;
    color: #555;
    margin-top: 15px;
}

.login-prompt a {
    color: #007bff;
    font-weight: 600;
    text-decoration: none;
}

.login-prompt a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 480px) {
    .car-details-container {
        width: 90%;
        padding: 15px;
    }

    .car-info p {
        font-size: 14px;
    }
}
</style>

<div class="car-details-container">
    <!-- Car Image -->
    @if($car->image)
        <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" class="car-image">
    @endif

    <!-- Car Info -->
    <h1>{{ $car->name }} <span style="font-weight: 400;">({{ $car->brand }})</span></h1>
    <div class="car-info">
        <p><strong>Model:</strong> {{ $car->model }}</p>
        <p><strong>Year:</strong> {{ $car->year }}</p>
        <p><strong>Type:</strong> {{ ucfirst($car->car_type) }}</p>
        <p><strong>Price per day:</strong> ${{ $car->daily_rent_price }}</p>
    </div>

    <hr>
    

    <!-- Booking Button or Login Prompt -->
    @auth
        <a href="{{ route('frontend.rentals.create', $car->id) }}" class="book-btn">Book This Car</a>
    @else
        <p class="login-prompt">Please <a href="{{ route('login') }}">login</a> to book this car.</p>
    @endauth
</div>

@endsection
