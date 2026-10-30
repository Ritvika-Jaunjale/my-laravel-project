<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Get all books
    public function index()
    {
        return response()->json([
            'total_books' => Book::count(),
            'books' => Book::all()
        ]);
    }

    // Add a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'sometimes|in:to_read,reading,finished',
            'is_bookmarked' => 'sometimes|boolean',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book added successfully',
            'book' => $book
        ], 201);
    }

    // Get one book
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
            'status' => 'sometimes|in:to_read,reading,finished',
            'is_bookmarked' => 'sometimes|boolean',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }

    // Count all books
    public function count()
    {
        return response()->json([
            'total_books' => Book::count()
        ]);
    }
}
