@extends('frontend.master')

@section('content')

<style>



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

</style>

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
                            <strong>Price/Day:</strong> <span class="text-success">${{ $car->daily_rent_price }}</span>
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
