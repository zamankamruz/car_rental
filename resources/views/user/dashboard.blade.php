@extends('user.master')

@section('content')

<style>
/* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container Styles */
.container {
    max-width: 950px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

/* Header Styles */
h3 {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Rental Cards Container */
.rental-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Individual Rental Card */
.rental-card {
    display: flex;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    padding: 15px;
    align-items: center;
}

.rental-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.15);
}

/* Left Section - Car Image */
.rental-card-left {
    width: 40%;
    max-width: 200px;
    background: #f4f4f4;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    overflow: hidden;
}

.rental-card-left img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

/* Right Section - Rental Details */
.rental-card-right {
    width: 60%;
    padding-left: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Title & Brand */
.rental-card-right h4 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.btn-cancel {
    width: 150px;
    background-color: #dc3545;
    color: white;
    font-size: 14px;
    padding: 10px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    margin-top: 10px;
}


.rental-card-right .brand {
    font-size: 14px;
    color: #777;
}

/* Rental Info */
.rental-card-right p {
    font-size: 14px;
    color: #555;
    margin: 4px 0;
}

/* Status Badge */
.status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    margin-top: 10px;
    align-self: flex-start;
}

.status.pending {
    background: #ffc107;
    color: #856404;
}

.status.approved {
    background: #28a745;
    color: white;
}

.status.cancelled {
    background: #dc3545;
    color: white;
}

.status.completed {
    background: #007bff;
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .rental-card {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }

    .rental-card-left {
        width: 100%;
    }

    .rental-card-right {
        width: 100%;
        padding-left: 0;
    }

    .status {
        align-self: center;
    }
}
</style>

<div class="container">
    <h3>Your Car Bookings</h3>

    @if($rentals->isEmpty())
        <p class="text-center text-muted">You have no rentals yet.</p>
    @else
        <div class="rental-list">
            @foreach($rentals as $rental)
                <div class="rental-card">

                    <div class="rental-card-right">
                        <h4>{{ $rental->car->name }} <span class="brand">({{ $rental->car->brand }})</span></h4>
                        <p><strong>Rental Period:</strong> {{ $rental->start_date }} to {{ $rental->end_date }}</p>
                        <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
                        <p>Status: {{ ucfirst($rental->status) }}</p>
                        @if($rental->status == 'ongoing' && now()->lt(\Carbon\Carbon::parse($rental->start_date)))
                            <form action="{{ route('frontend.rentals.cancel', $rental->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-cancel">Cancel Booking</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
