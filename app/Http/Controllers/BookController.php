<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        $books = Book::with(['author', 'category'])
            ->withCount('loans')
            ->where('stock', '>', 0)
            ->orderByDesc('loans_count')
            ->paginate(10);

        return view('books.index', compact('books'));
    }

    // Create book
    public function create()
    {
        $this->authorize('create', Book::class);

        return 'Create Book Page';
    }

    // Update book
    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        return 'Update Book Page';
    }

    // Delete book
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        return 'Delete Book Page';
    }
}
