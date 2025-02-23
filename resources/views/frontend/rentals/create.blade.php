@extends('frontend.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container */
.rental {
    max-width: 600px;
    margin: 50px auto;
    background: #ffffff;
    padding: 25px;
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

/* Form Row - Two Columns */
.form-row {
    display: flex;
    gap: 15px;
    justify-content: space-between;
}

.form-group {
    flex: 1;
    margin-bottom: 15px;
}

/* Labels */
.form-label {
    font-size: 14px;
    font-weight: 500;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

/* Inputs */
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
@media (max-width: 600px) {
    .form-row {
        flex-direction: column;
    }

    .rental {
        width: 90%;
        padding: 20px;
    }
}
</style>

<div class="rental">
    
    <!-- Page Header -->
    <h1>Book {{ $car->name }}</h1>

    <!-- Booking Form -->
    <form action="{{ route('frontend.rentals.store', $car->id) }}" method="POST">
        @csrf

        <!-- Two Fields Per Row -->
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="start_date">Rental Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="end_date">Rental End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn-submit">Confirm Booking</button>
    </form>

</div>

@endsection
