
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display all books
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    // Store a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    // Display one book
    public function show(Book $book)
    {
        return response()->json($book);
    }

    // Update a book
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
        ]);

        $book->update($validated);

        return response()->json($book);
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
