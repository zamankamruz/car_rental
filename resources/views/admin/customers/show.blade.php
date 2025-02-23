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

/* Textarea */
textarea.form-control {
    height: 100px;
    resize: none;
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
    <h1>Edit Customer</h1>

    <!-- Edit Customer Form -->
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Two Fields Per Row -->
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="name">Customer Name</label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Customer Email</label>
                <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
            </div>

            <div class="form-group">
                <label class="form-label" for="address">Address</label>
                <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn-submit">Update Customer</button>
    </form>

</div>

@endsection
