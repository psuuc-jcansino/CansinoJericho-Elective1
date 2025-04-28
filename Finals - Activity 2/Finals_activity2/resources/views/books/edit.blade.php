<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: #2ecc71;
            color: #fff;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #3498db;
            outline: none;
        }

        .errors {
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 4px;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .errors li {
            list-style: none;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>
            <div>
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>
            </div>
            <div>
                <label for="published_date">Published Date:</label>
                <input type="date" id="published_date" name="published_date" value="{{ old('published_date', $book->published_date) }}" required>
            </div>
            <div>
                <input type="submit" value="Save Changes">
            </div>
        </form>
    </div>
</body>
</html>