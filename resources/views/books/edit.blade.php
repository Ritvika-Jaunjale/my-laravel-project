<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
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
        input, select {
            width: 100%;
            padding: 11px;
            margin: 10px 0 18px;
            box-sizing: border-box;
        }
        button, a {
            background: #71866B;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }
        .error { color: #A66F56; }
    </style>
</head>
<body>
<div class="container">
    <h1>✏️ Edit Book</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Book Title</label>
        <input type="text" name="title"
               value="{{ old('title', $book->title) }}" required>

        <label>Author</label>
        <input type="text" name="author"
               value="{{ old('author', $book->author) }}" required>

        <label>Reading Status</label>
        <select name="status" required>
            <option value="to_read" {{ old('status', $book->status) == 'to_read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ old('status', $book->status) == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>

        <button type="submit">Update Book</button>
        <a href="{{ route('books.index') }}">Back</a>
    </form>
</div>
</body>
</html>
