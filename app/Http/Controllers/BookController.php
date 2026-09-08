<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // =========================================================
    // SHOW BOOKS
    // =========================================================

    public function index(Request $request)
    {
        // BookPolicy: Member, Librarian, Admin
        $this->authorize('viewAny', Book::class);

        $books = Book::with(['author', 'category'])
            ->withCount('loans')

            // Only show books that are currently available
            ->where('stock', '>', 0)

            // =====================================================
            // SEARCH
            // Example:
            // /books?search=laravel
            // =====================================================

            ->when($request->search, function ($query, $search) {

                $query->where(function ($query) use ($search) {

                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('isbn', 'like', "%{$search}%");
                });
            })

            // =====================================================
            // CATEGORY FILTER
            // Example:
            // /books?category=programming
            // =====================================================

            ->when($request->category, function ($query, $category) {

                $query->whereHas('category', function ($query) use ($category) {

                    $query->where('slug', $category);
                });
            })

            // =====================================================
            // AUTHOR FILTER
            // Example:
            // /books?author=1
            // =====================================================

            ->when($request->author, function ($query, $author) {

                $query->whereHas('author', function ($query) use ($author) {

                    $query->where('id', $author);
                });
            })

            // Most borrowed books first
            ->orderByDesc('loans_count')

            // Pagination
            ->paginate(10)

            // Keep filters when moving between pages
            ->withQueryString();

        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.index', compact(
            'books',
            'authors',
            'categories'
        ));
    }


    // =========================================================
    // CREATE BOOK FORM
    // =========================================================

    public function create()
    {
        // Only Librarian and Admin
        $this->authorize('create', Book::class);

        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact(
            'authors',
            'categories'
        ));
    }


    // =========================================================
    // STORE BOOK
    // =========================================================

    public function store(Request $request)
    {
        // Only Librarian and Admin
        $this->authorize('create', Book::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'isbn' => [
                'required',
                'string',
                'max:50',
                'unique:books,isbn',
            ],

            'author_id' => [
                'required',
                'exists:authors,id',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }


    // =========================================================
    // EDIT BOOK FORM
    // =========================================================

    public function edit(Book $book)
    {
        // Only Librarian and Admin
        $this->authorize('update', $book);

        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact(
            'book',
            'authors',
            'categories'
        ));
    }


    // =========================================================
    // UPDATE BOOK
    // =========================================================

    public function update(Request $request, Book $book)
    {
        // Only Librarian and Admin
        $this->authorize('update', $book);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'isbn' => [
                'required',
                'string',
                'max:50',
                'unique:books,isbn,' . $book->id,
            ],

            'author_id' => [
                'required',
                'exists:authors,id',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }


    // =========================================================
    // DELETE BOOK
    // =========================================================

    public function destroy(Book $book)
    {
        // Only Admin
        $this->authorize('delete', $book);

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
