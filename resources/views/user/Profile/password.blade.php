@extends('user.master')

@section('content')

<style>
/* General Styles */
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
h3 {
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

/* Form Fields */
.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-size: 15px;
    font-weight: 500;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 12px;
    font-size: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
    outline: none;
}

/* Alert Messages */
.alert {
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 15px;
    font-size: 14px;
    text-align: center;
}

.alert-success {
    background: #28a745;
    color: white;
}

.alert-danger {
    background: #dc3545;
    color: white;
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
    
    <!-- Success & Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Password Update Section -->
    <h3>Update Password</h3>
    
    <form action="{{ route('dashboard.updatePassword') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Current Password:</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">New Password:</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn-submit">Update Password</button>
    </form>
</div>

@endsection
