@extends('admin.master')

@section('content')

<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row my-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Cars</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCars }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Available Cars</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $availableCars }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Rentals</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalRentals }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Earnings</div>
                <div class="card-body">
                    <h5 class="card-title">${{ number_format($totalEarnings, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
