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
    max-width: 1100px;
    background: #ffffff;
    border-radius: 8px;
    padding: 0px 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Header */
h1 {
    text-align: center;
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

/* Add New Car Button */
.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    font-size: 12px;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Table Wrapper */
.table-responsive {
    overflow-x: auto;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table thead {
    background: #007bff;
    color: white;
}

.table thead th {
    padding: 8px;
    font-size: 12px;
    text-align: left;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
}

.table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.table tbody td {
    padding: 8px;
    font-size: 11px;
    color: #555;
    vertical-align: middle;
}

/* Image Styling */
.car-image {
    max-width: 50px;
    border-radius: 6px;
    display: block;
}

/* Badge Styling */
.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
}

.badge-success {
    background: #28a745;
    color: white;
}

.badge-danger {
    background: #dc3545;
    color: white;
}

/* Button Styling */
.btn {
    font-size: 10px;
    padding: 5px 8px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-warning {
    background-color: #ffc107;
    color: #333;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 3px;
}

/* Full Responsive Table */
@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
    }

    .table {
        display: block;
        width: 100%;
        overflow-x: auto;
    }

    .table thead {
        display: none;
    }

    .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
    }

    .table tbody tr {
        margin-bottom: 10px;
        display: block;
        border-radius: 6px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
        padding: 8px;
        background: white;
    }

    .table tbody td {
        text-align: left;
        padding: 5px;
        font-size: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table tbody td::before {
        content: attr(data-label);
        font-weight: bold;
        flex: 1;
        color: #333;
    }

    .car-image {
        max-width: 40px;
    }

    .btn {
        font-size: 10px;
        padding: 4px 6px;
    }

    .action-buttons {
        flex-direction: column;
        gap: 3px;
    }
}
</style>

<div class="container">
    
    <!-- Page Header -->
    <h1>Manage Cars</h1>
    
    <!-- Add New Car Button -->
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary mb-2">+ Add New Car</a>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Type</th>
                    <th>Price/Day</th>
                    <th>Availability</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td data-label="ID">{{ $car->id }}</td>
                        <td data-label="Name">{{ $car->name }}</td>
                        <td data-label="Brand">{{ $car->brand }}</td>
                        <td data-label="Model">{{ $car->model }}</td>
                        <td data-label="Year">{{ $car->year }}</td>
                        <td data-label="Type">{{ ucfirst($car->car_type) }}</td>
                        <td data-label="Price/Day">${{ number_format($car->daily_rent_price, 2) }}</td>
                        <td data-label="Availability">
                            <span class="badge {{ $car->availability ? 'badge-success' : 'badge-danger' }}">
                                {{ $car->availability ? 'Available' : 'Not Available' }}
                            </span>
                        </td>
                        <td data-label="Image">
                            @if($car->image)
                                <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" class="car-image">
                            @else
                                N/A
                            @endif
                        </td>
                        <td data-label="Actions" class="action-buttons">
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
