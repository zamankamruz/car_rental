<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
<style>

    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Sidebar */
.sidebar {
    width: 200px;
    background: #1e1e2f;
    padding: 10px;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2);
}

/* Sidebar Branding */
.sidebar h2 {
    color: #ffffff;
    text-align: center;
    margin-bottom: 30px;
    margin-top: 30px;
    font-size: 15px;
    letter-spacing: 1px;
}

/* Sidebar Navigation */
.sidebar ul {
    list-style: none;
    padding: 0;
    flex-grow: 1;
}

.sidebar ul li {
    margin-bottom: 15px;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 12px 15px;
    font-size: 15px;
    border-radius: 6px;
    transition: 0.3s ease-in-out;
}

.sidebar ul li a:hover {
    background: #007bff;
    transform: translateX(8px);
    box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.2);
}

/* Logout Button */
.logout-btn {
    background: #dc3545;
    color: white;
    padding: 12px;
    border: none;
    width: 100%;
    text-align: center;
    cursor: pointer;
    font-size: 1em;
    border-radius: 6px;
    transition: 0.3s ease-in-out;
}

.logout-btn:hover {
    background: #c82333;
    transform: scale(1.05);
    box-shadow: 0px 4px 10px rgba(220, 53, 69, 0.2);
}

/* Main Content */
.main-content {
    margin-left: 200px; /* Fixed width */
    padding: 30px;
    width: calc(100% - 200px); /* Adjusted for sidebar */
    background: #f4f6f9;
    min-height: 100vh;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .main-content {
        margin-left: 200px;
        width: calc(100% - 200px);
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        text-align: center;
        padding-bottom: 10px;
    }

    .sidebar ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .sidebar ul li {
        margin: 5px;
    }

    .main-content {
        margin-left: 0;
        width: 100%;
        padding: 15px;
    }
}

</style>
</head>
<body>

<div class="dashboard-wrapper">
    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="{{ route('user.dashboard') }}">🏠 Dashboard</a></li>
            <li><a href="{{ route('dashboard.Profile') }}">👤 Profile</a></li>
            <li><a href="{{ route('dashboard.Password') }}">🔒 Change Password</a></li>
            <li><a href="{{ route('user.dashboard') }}">📁 My Rentals</a></li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</div>

</body>
</html>
