<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Book::class);

        $books = Book::with(['author', 'category'])
            ->withCount('loans')

            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('isbn', 'like', "%{$search}%");
                });
            })

            ->when($request->category, function ($query, $category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })

            ->when($request->author, function ($query, $author) {
                $query->where('author_id', $author);
            })

            ->when(
                $request->has('available'),
                function ($query) use ($request) {
                    if ($request->boolean('available')) {
                        $query->where('stock', '>', 0);
                    } else {
                        $query->where('stock', '=', 0);
                    }
                }
            )

            ->orderByDesc('loans_count')
            ->paginate(10)
            ->withQueryString();

        $authors = Author::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

        return view('books.index', compact(
            'books',
            'authors',
            'categories'
        ));
    }

    public function create()
    {
        $this->authorize('create', Book::class);

        $authors = Author::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

        return view('books.create', compact(
            'authors',
            'categories'
        ));
    }

    public function store(Request $request)
    {
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

    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        $authors = Author::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact(
            'book',
            'authors',
            'categories'
        ));
    }

    public function update(Request $request, Book $book)
    {
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

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
