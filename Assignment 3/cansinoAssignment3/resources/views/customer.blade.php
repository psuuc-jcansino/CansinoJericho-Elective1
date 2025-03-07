<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>

<body>
    <h2>Customer Information</h2>

    <label>Customer ID:</label>
    <input type="text" value="{{ $id }}" readonly><br><br>

    <label>Name:</label>
    <input type="text" value="{{ $name }}" readonly><br><br>

    <label>Address:</label>
    <input type="text" value="{{ $address }}" readonly><br><br>
</body>

</html>