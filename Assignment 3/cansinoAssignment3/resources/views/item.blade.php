<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View</title>
</head>

<body>
    <h2>Item Information</h2>

    <label>Item No:</label>
    <input type="text" value="{{ $itemNo }}" readonly><br><br>

    <label>Name:</label>
    <input type="text" value="{{ $name }}" readonly><br><br>

    <label>Price:</label>
    <input type="text" value="{{ $price }}" readonly><br><br>
</body>

</html>