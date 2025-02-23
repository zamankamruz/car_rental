<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            overflow-y: auto;
            transition: all 0.3s;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 20px;
        }

        .sidebar a.active {
            background-color: #007bff;
        }

        .sidebar .sidebar-header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
            flex-grow: 1;
            background-color: #f8f9fa;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #343a40;
            color: white;
            border-radius: 5px;
        }

        .navbar .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <!-- Profile Picture -->
    <div class="text-center mb-4">
        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?d=mp" 
             alt="Profile Picture" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
    </div>


       <span>{{ Auth::user()->name }}</span>
       <hr>
       <a href="{{ route('admin.dashboard') }}"><i class="fas fa-car"></i> Dashboard</a>
       <a href="{{ route('admin.cars.index') }}"><i class="fas fa-car"></i> Cars</a>
        <a href="{{ route('admin.rentals.index') }}"><i class="fas fa-calendar-check"></i> Rentals</a>
        <a href="{{ route('admin.customers.index') }}"><i class="fas fa-users"></i> Customers</a>
        <hr>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">

        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
