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
    <h1>Manage Customers</h1>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Rental History</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td data-label="Customer ID">{{ $customer->id }}</td>
                        <td data-label="Name">{{ $customer->name }}</td>
                        <td data-label="Email">{{ $customer->email }}</td>
                        <td data-label="Phone">{{ $customer->phone ?? 'N/A' }}</td>
                        <td data-label="Address">{{ $customer->address ?? 'N/A' }}</td>
                        <td data-label="Rental History">
                            <a href="{{ route('admin.customers.rentals', $customer->id) }}" class="btn btn-info">View Rentals</a>
                        </td>
                        <td data-label="Actions" class="action-buttons">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
