<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display all books.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Filter by title, if supplied.
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter by author, if supplied.
        if ($request->filled('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }

        return response()->json($query->get(), 200);
    }

    /**
     * Store a newly created book.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
        ]);

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    /**
     * Display one book.
     */
    public function show(Book $book)
    {
        return response()->json($book, 200);
    }

    /**
     * Update a book.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'pages' => 'sometimes|required|integer|min:1',
        ]);

        $book->update($validated);

        return response()->json($book, 200);
    }

    /**
     * Delete a book.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}