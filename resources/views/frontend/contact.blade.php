@extends('frontend.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Contact Container */
.contact-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
}

/* Header Section */
.contact-header h1 {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.contact-header p {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

/* Contact Info */
.contact-info {
    text-align: left;
    margin-bottom: 25px;
}

.contact-info p {
    font-size: 16px;
    color: #555;
    margin: 5px 0;
}

.contact-info i {
    color: #007bff;
    margin-right: 8px;
}

/* Contact Form */
.contact-form {
    text-align: left;
}

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

textarea.form-control {
    height: 120px;
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

/* Google Map */
.map-container {
    margin-top: 20px;
    border-radius: 12px;
    overflow: hidden;
}

/* Responsive */
@media (max-width: 480px) {
    .contact-container {
        width: 90%;
        padding: 20px;
    }
}
</style>

<div class="contact-container">
    
    <!-- Contact Header -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Reach out to us for any inquiries or assistance.</p>
    </div>

    <!-- Contact Info -->
    <div class="contact-info">
        <p><i class="fas fa-map-marker-alt"></i> 123 Main Street, New York, USA</p>
        <p><i class="fas fa-phone"></i> +1 234 567 890</p>
        <p><i class="fas fa-envelope"></i> support@yourcompany.com</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Your Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Your Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Message:</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Send Message</button>
        </form>
    </div>

    <!-- Google Map (Optional) -->
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.658653795812!2d-74.0060153845936!3d40.712776279330485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a17895e1b19%3A0x2f59c40e3e0b6a93!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1649922027746!5m2!1sen!2s"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>

</div>

@endsection
