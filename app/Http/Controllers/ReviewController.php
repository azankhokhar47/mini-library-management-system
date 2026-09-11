<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Review::class);

        $user = auth()->user();

        if ($user->role === 'member') {

            $reviews = Review::where('user_id', $user->id)
                ->with(['user', 'book'])
                ->latest()
                ->paginate(10);

        } else {

            $reviews = Review::with(['user', 'book'])
                ->latest()
                ->paginate(10);
        }

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $this->authorize('create', Review::class);

        $books = Book::orderBy('title')->get();

        return view('reviews.create', compact('books'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Review::class);

        $validated = $request->validate([
            'book_id' => [
                'required',
                'exists:books,id',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $validated['user_id'] = auth()->id();

        Review::create($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);

        $books = Book::orderBy('title')->get();

        return view('reviews.edit', compact('review', 'books'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $review->update($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
