<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #F5EFE3;
            color: #604633;
            padding: 30px;
        }
        .container {
            max-width: 550px;
            margin: auto;
            background: #FFF9EF;
            padding: 25px;
            border-radius: 12px;
        }
        a {
            display: inline-block;
            background: #71866B;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>📖 Book Details</h1>

    <h3>Title: {{ $book->title }}</h3>
    <p>Author: {{ $book->author }}</p>
    <p>Status: {{ str_replace('_', '-', $book->status) }}</p>

    <a href="{{ route('books.index') }}">Back to Reading List</a>
    <a href="{{ route('books.edit', $book->id) }}">Edit Book</a>
</div>
</body>
</html>
