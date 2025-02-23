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
    max-width: 600px;
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

/* Profile Section */
.profile-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
}

.profile-card-header {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-card-header i {
    font-size: 20px;
    color: #007bff;
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

    <!-- Profile Update Section -->
    <div class="profile-card">
        <div class="profile-card-header">
            <i class="fas fa-user"></i> Your Profile
        </div>

        <form action="{{ route('dashboard.updateProfile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Phone Number:</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
            </div>
            
            <button type="submit" class="btn-submit">Update Profile</button>
        </form>
    </div>
</div>

@endsection
