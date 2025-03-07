<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order View</title>
</head>

<body>
    <h2>Order Information</h2>

    <label>Customer ID:</label>
    <input type="text" value="{{ $customerId }}" readonly><br><br>

    <label>Name:</label>
    <input type="text" value="{{ $name }}" readonly><br><br>

    <label>Order No:</label>
    <input type="text" value="{{ $orderNo }}" readonly><br><br>

    <label>Date:</label>
    <input type="text" value="{{ \Carbon\Carbon::parse($date)->format('F d, Y') }}" readonly><br><br>
</body>

</html>