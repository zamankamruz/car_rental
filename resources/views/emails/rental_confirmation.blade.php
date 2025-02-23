<!DOCTYPE html>
<html>
<head>
    <title>Rental Confirmation</title>
</head>
<body>
    @if($isAdminNotification)
        <h2>New Rental Booking</h2>
        <p>Customer: {{ $rental->user->name }}</p>
    @else
        <h2>Thank you for your booking, {{ $rental->user->name }}!</h2>
    @endif

    <p>Car: {{ $rental->car->name }} ({{ $rental->car->brand }})</p>
    <p>Rental Period: {{ $rental->start_date }} to {{ $rental->end_date }}</p>
    <p>Total Cost: ${{ $rental->total_cost }}</p>
    <p>Status: {{ ucfirst($rental->status) }}</p>
</body>
</html>
