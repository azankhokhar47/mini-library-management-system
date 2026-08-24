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

    public function create()
    {
        $this->authorize('create', Book::class);
        return 'Create Book Page';
    }

    public function update(Book $book)
    {
        $this->authorize('update', $book);
        return 'Update Book Page';
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        return 'Delete Book Page';
    }
}
