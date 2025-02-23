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
.form-control,
.form-control-file,
.form-select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 6px;
    transition: 0.3s ease-in-out;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
    outline: none;
}

/* Image Preview */
.image-preview {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

.image-preview img {
    max-width: 150px;
    border-radius: 8px;
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

    .container {
        width: 90%;
        padding: 15px;
    }
}
</style>

<div class="container">
    
    <!-- Page Header -->
    <h1>Edit Car</h1>

    <!-- Car Edit Form -->
    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Two Fields Per Row -->
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="name">Car Name</label>
                <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="model">Model</label>
                <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="year">Year of Manufacture</label>
                <input type="number" name="year" class="form-control" value="{{ $car->year }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="car_type">Car Type</label>
                <input type="text" name="car_type" class="form-control" value="{{ $car->car_type }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="daily_rent_price">Daily Rent Price</label>
                <input type="text" name="daily_rent_price" class="form-control" value="{{ $car->daily_rent_price }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="availability">Availability Status</label>
                <select name="availability" class="form-select">
                    <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="image">Car Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
        </div>

        <!-- Image Preview -->
        @if($car->image)
            <div class="image-preview">
                <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}">
            </div>
        @endif

        <button type="submit" class="btn-submit">Update Car</button>
    </form>

</div>

@endsection
