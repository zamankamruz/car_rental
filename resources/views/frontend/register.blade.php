@extends('frontend.master')

@section('content')

<style>
    /* Register Container */
.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background: #f4f7fc;
}

/* Register Box */
.register-box {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: center;
}

/* Title */
.register-title {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

/* Input Row (2 Items in One Row) */
.input-row {
    display: flex;
    gap: 15px;
    justify-content: space-between;
}

/* Input Group */
.input-group {
    text-align: left;
    width: 50%;
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

/* Register Button */
.register-button {
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
    margin-top: 10px;
}

.register-button:hover {
    background: #0056b3;
}

/* Login Link */
.login-link {
    margin-top: 15px;
    font-size: 14px;
    color: #666;
}

.login-link a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
}

.login-link a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 480px) {
    .input-row {
        flex-direction: column;
    }
    
    .input-group {
        width: 100%;
    }
}

</style>
<div class="register-container">
    <div class="register-box">
        <h2 class="register-title">Create an Account</h2>

        <!-- Error Messages -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Name & Email (Two in One Row) -->
            <div class="input-row">
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" required>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" required>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Phone & Address -->
            <div class="input-row">
                <div class="input-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" required>
                    @error('phone')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" required>
                    @error('address')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Password & Confirm Password -->
            <div class="input-row">
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="register-button">Register</button>
        </form>

        <!-- Login Link -->
        <p class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</div>
@endsection
