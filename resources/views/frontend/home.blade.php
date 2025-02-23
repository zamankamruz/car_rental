@extends('frontend.master')

@section('content')

<style>
    /* Improved Hero Section */
    .hero {
        height: 60vh;
        display: flex;
        margin-top: 0px;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
        padding: 20px;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 600px;
    }

    .hero h1 {
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .hero .btn-primary {
        font-size: 1.2rem;
        padding: 12px 25px;
        border-radius: 30px;
        transition: 0.3s;
        background: #ff5733;
        border: none;
    }

    .hero .btn-primary:hover {
        background-color: #c70039;
    }

     /* Improved Car Card Design */
     .car-card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background: #fff;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .car-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.3);
    }

    .car-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .car-card .card-body {
        padding: 20px;
    }

    .car-card .btn {
        border-radius: 25px;
        font-size: 1rem;
        padding: 10px 15px;
    }

    /* Availability Badge */
    .availability {
        font-size: 0.9rem;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .available {
        background: #28a745;
        color: white;
    }

    .not-available {
        background: #dc3545;
        color: white;
    }

</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Drive Your Dream Car Today</h1>
        <p>Find the perfect luxury car rental at unbeatable prices.</p>
        <a href="#car-listing" class="btn btn-primary">Browse Cars</a>
    </div>
</section>

<!-- Car Listing Section -->
<div class="container mt-5" id="car-listing">
    <h2 class="text-center mb-4">Available Cars for Rent</h2>
    <div class="row">
        @forelse($cars as $car)
            <div class="col-md-4">
                <div class="card car-card mb-4">
                    @if($car->image)
                        <img src="{{ asset('images/cars/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">
                            <strong>Brand:</strong> {{ $car->brand }}<br>
                            <strong>Model:</strong> {{ $car->model }}<br>
                            <strong>Year:</strong> {{ $car->year }}<br>
                            <strong>Price/Day:</strong> <span class="text-success">${{ $car->daily_rent_price }}</span><br>
                            <strong>Status:</strong> 
                            @if($car->availability)
                                <span class="availability available">Available</span>
                            @else
                                <span class="availability not-available">Not Available</span>
                            @endif
                        </p>
                        <a href="{{ route('frontend.cars.show', $car->id) }}" class="btn btn-dark w-100">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No cars available at the moment.</p>
        @endforelse
    </div>
</div>

@endsection
