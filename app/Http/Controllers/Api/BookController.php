<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index(Request $request)
    {
        $books = Book::with(['author', 'category'])
            ->withCount('loans')

            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('isbn', 'like', "%{$search}%");
                });
            })

            ->when($request->category, function ($query, $category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })

            ->when($request->author, function ($query, $author) {
                $query->where('author_id', $author);
            })

            ->when($request->available, function ($query) {
                $query->where('stock', '>', 0);
            })

            ->when($request->sort === 'latest', function ($query) {
                $query->latest();
            }, function ($query) {
                $query->orderByDesc('loans_count');
            })

            ->paginate(10);

        return BookResource::collection($books);
    }


    // GET /api/books/{book}
    public function show(Book $book)
    {
        $book->load(['author', 'category'])
            ->loadCount('loans');

        return new BookResource($book);
    }
}
