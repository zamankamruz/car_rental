@extends('frontend.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container */
.rentals {
    max-width: 950px;
    margin: 30px auto;
    margin-top: 50px;
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

/* Rental Card */
.carddd {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
    transition: all 0.3s ease-in-out;
}

.carddd:hover {
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.12);
}

.cardtabody h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.cardtabody p {
    font-size: 14px;
    color: #555;
    margin-bottom: 8px;
}

.cardtabody p strong {
    color: #333;
}

/* Status Badge */
.badge {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    display: inline-block;
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

/* Cancel Button */
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

.btn-cancel:hover {
    background-color: #c82333;
}

/* Responsive */
@media (max-width: 600px) {
    .rentals {
        width: 90%;
        padding: 15px;
    }

    .carddd {
        padding: 15px;
    }
}
</style>

<div class="rentals">
    
    <!-- Page Header -->
    <h1>Your Rentals</h1>

    @if($rentals->isEmpty())
        <p style="text-align: center; color: #777;">You have no active rentals.</p>
    @else
        @foreach($rentals as $rental)
            <div class="carddd">
                <div class="cardtabody">
                    <h4>{{ $rental->car->name }} ({{ $rental->car->brand }})</h4>
                    <p><strong>From:</strong> {{ $rental->start_date }} <strong>To:</strong> {{ $rental->end_date }}</p>
                    <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            {{ $rental->status == 'ongoing' ? 'badge-ongoing' : 
                               ($rental->status == 'completed' ? 'badge-completed' : 'badge-canceled') }}">
                            {{ ucfirst($rental->status) }}
                        </span>
                    </p>

                    @if($rental->status == 'ongoing' && now()->lt(\Carbon\Carbon::parse($rental->start_date)))
                        <form action="{{ route('frontend.rentals.cancel', $rental->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-cancel">Cancel Booking</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif

</div>

@endsection
