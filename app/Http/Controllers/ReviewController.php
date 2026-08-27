<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show reviews
    public function index()
    {
        $reviews = Review::with(['user', 'book'])
            ->latest()
            ->paginate(10);

        return view('reviews.index', compact('reviews'));
    }

    // Create review page
    public function create()
    {
        $this->authorize('create', Review::class);

        return 'Create Review Page';
    }

    // Store review
    public function store(Request $request)
    {
        $this->authorize('create', Review::class);

        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Review::create($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review added successfully.');
    }

    // Edit own review
    public function edit(Review $review)
    {
        $this->authorize('update', $review);

        return 'Edit Review Page';
    }

    // Update own review
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    // Delete review
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
