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

/* Responsive Table Wrapper */
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
    padding: 10px;
    font-size: 14px;
    text-align: left;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
    transition: background 0.3s ease;
}

.table tbody tr:hover {
    background: #f1f1f1;
}

.table tbody td {
    padding: 10px;
    font-size: 13px;
    color: #555;
    vertical-align: middle;
}

/* Status Badges */
.badge {
    padding: 6px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
}

.badge-pending {
    background: #ffc107;
    color: #333;
}

.badge-approved {
    background: #28a745;
    color: white;
}

.badge-rejected {
    background: #dc3545;
    color: white;
}

/* Button Styling */
.btn {
    font-size: 12px;
    padding: 6px 10px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
    border: none;
}

.btn-info:hover {
    background-color: #138496;
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
    gap: 5px;
}

/* Responsive Table */
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
        padding: 10px;
        background: white;
    }

    .table tbody td {
        text-align: left;
        padding: 8px;
        font-size: 12px;
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

    .btn {
        font-size: 12px;
        padding: 5px 8px;
    }

    .action-buttons {
        flex-direction: column;
        gap: 3px;
    }
}
</style>

<div class="container">
    
    <!-- Page Header -->
    <h1>Manage Rentals</h1>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Rental Period</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td data-label="Rental ID">{{ $rental->id }}</td>
                        <td data-label="Customer">{{ $rental->user->name }}</td>
                        <td data-label="Car">{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                        <td data-label="Rental Period">{{ $rental->start_date }} to {{ $rental->end_date }}</td>
                        <td data-label="Total Cost">${{ number_format($rental->total_cost, 2) }}</td>
                        <td data-label="Status">
                            <span class="badge 
                                {{ $rental->status == 'pending' ? 'badge-pending' : 
                                   ($rental->status == 'approved' ? 'badge-approved' : 'badge-rejected') }}">
                                {{ ucfirst($rental->status) }}
                            </span>
                        </td>
                        <td data-label="Actions" class="action-buttons">
                            <a href="{{ route('admin.rentals.show', $rental->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this rental?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
