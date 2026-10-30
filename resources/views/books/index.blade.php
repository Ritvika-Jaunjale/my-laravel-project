<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #F5EFE3;
            color: #604633;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #FFF9EF;
            padding: 25px;
            border-radius: 12px;
        }
        h1 { color: #795B46; }
        a, button {
            background: #71866B;
            color: white;
            padding: 9px 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }
        .delete { background: #A66F56; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #D6B56D;
            text-align: left;
        }
        select { padding: 8px; }
        .message { color: #477044; }
    </style>
</head>
<body>
<div class="container">
    <h1>📚 My Reading List</h1>

    @if(session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    <a href="{{ route('books.create') }}">+ Add New Book</a>

    <h3>Filter Books</h3>
    <form method="GET" action="{{ route('books.index') }}">
        <select name="status">
            <option value="">All Books</option>
            <option value="to_read" {{ request('status') == 'to_read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ request('status') == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>
        <button type="submit">Filter</button>
        <a href="{{ route('books.index') }}">Clear</a>
    </form>

    @if($books->isEmpty())
        <p>No books found. Add your first book!</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ str_replace('_', '-', $book->status) }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}">Edit</a>

                            <form action="{{ route('books.destroy', $book->id) }}"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
