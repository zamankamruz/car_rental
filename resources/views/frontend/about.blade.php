@extends('frontend.master')

@section('content')

<style>
/* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
}

/* Container */
.about-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
}

/* Header Section */
.about-header h1 {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.about-header p {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

/* Content Section */
.about-content {
    text-align: left;
    font-size: 16px;
    color: #555;
    line-height: 1.6;
}

/* Our Team Section */
.team-container {
    margin-top: 30px;
}

.team-container h2 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #333;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    text-align: center;
}

.team-member {
    background: white;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.team-member img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.team-member h3 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.team-member p {
    font-size: 14px;
    color: #777;
}

/* Responsive */
@media (max-width: 480px) {
    .about-container {
        width: 90%;
        padding: 20px;
    }
}
</style>

<div class="about-container">
    
    <!-- About Us Header -->
    <div class="about-header">
        <h1>About Us</h1>
        <p>We are committed to providing the best car rental services with a seamless booking experience.</p>
    </div>

    <!-- About Us Content -->
    <div class="about-content">
        <p>Welcome to our car rental service! We specialize in offering high-quality vehicles at affordable prices, ensuring our customers experience a smooth and hassle-free ride. Whether you need a car for a weekend getaway, a business trip, or long-term rental, we've got you covered.</p>

        <p>Our mission is to provide a reliable, efficient, and affordable car rental experience, making it easy for customers to find the perfect vehicle for their needs.</p>

        <p>We take pride in our **exceptional customer service**, offering flexible rental options, transparent pricing, and a wide range of vehicles to choose from.</p>
    </div>

    <!-- Our Team Section -->
    <div class="team-container">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <h3>John Doe</h3>
                <p>CEO & Founder</p>
            </div>
            <div class="team-member">
                <h3>Jane Smith</h3>
                <p>Operations Manager</p>
            </div>
            <div class="team-member">
                <h3>Michael Lee</h3>
                <p>Customer Support Lead</p>
            </div>
        </div>
    </div>

</div>

@endsection
