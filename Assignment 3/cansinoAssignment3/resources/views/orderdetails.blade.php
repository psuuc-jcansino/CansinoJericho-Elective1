<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details View</title>
</head>

<body>
    <h2>Order Details</h2>

    <label>Transaction No:</label>
    <input type="text" value="{{ $transNo }}" readonly><br><br>

    <label>Order No:</label>
    <input type="text" value="{{ $orderNo }}" readonly><br><br>

    <label>Item ID:</label>
    <input type="text" value="{{ $itemId }}" readonly><br><br>

    <label>Name:</label>
    <input type="text" value="{{ $name }}" readonly><br><br>

    <label>Price:</label>
    <input type="text" value="₱{{ number_format($price, 2) }}" readonly><br><br>

    <label>Quantity:</label>
    <input type="text" value="{{ $qty }}" readonly><br><br>

    <label>Total Price:</label>
    <input type="text" value="₱{{ number_format($price * $qty, 2) }}" readonly><br><br>
</body>

</html>