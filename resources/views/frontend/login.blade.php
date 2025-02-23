@extends('frontend.master')

@section('content')

<style>

/* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background: #f4f7fc;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

/* Login Container */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

/* Login Box */
.login-box {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Title */
.login-title {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

/* Input Fields */
.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: 0.3s ease-in-out;
}

.input-group input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

/* Error Messages */
.error-message {
    background: #ffebeb;
    color: #d9534f;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 10px;
    font-size: 14px;
}

.error-text {
    color: #d9534f;
    font-size: 12px;
}

/* Checkbox & Forgot Password */
.flex-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-size: 14px;
}

.checkbox-container {
    display: flex;
    align-items: center;
    color: #555;
}

.checkbox-container input {
    margin-right: 5px;
}

.forgot-password {
    color: #007bff;
    text-decoration: none;
    transition: 0.3s;
}

.forgot-password:hover {
    text-decoration: underline;
}

/* Login Button */
.login-button {
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

.login-button:hover {
    background: #0056b3;
}

/* Register Link */
.register-link {
    margin-top: 15px;
    font-size: 14px;
    color: #666;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
}

.register-link a:hover {
    text-decoration: underline;
}


</style>

<div class="login-container">
    <div class="login-box">
        <h2 class="login-title">Login to Your Account</h2>

        <!-- Error Messages -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex-container">
                <label class="checkbox-container">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="login-button">Login</button>
        </form>

        <!-- Register Link -->
        <p class="register-link">
            Don't have an account?
            <a href="{{ route('register') }}">Sign up</a>
        </p>
    </div>
</div>
@endsection
