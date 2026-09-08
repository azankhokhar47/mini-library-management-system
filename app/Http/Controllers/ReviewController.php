<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // =========================================================
    // SHOW REVIEWS
    // =========================================================

    public function index()
    {
        $reviews = Review::with(['user', 'book'])
            ->latest()
            ->paginate(10);

        return view('reviews.index', compact('reviews'));
    }


    // =========================================================
    // CREATE REVIEW PAGE
    // =========================================================

    public function create()
    {
        // Any authenticated user can create a review
        $this->authorize('create', Review::class);

        return 'Create Review Page';
    }


    // =========================================================
    // STORE REVIEW
    // =========================================================

    public function store(Request $request)
    {
        // Any authenticated user can create a review
        $this->authorize('create', Review::class);

        // Validate review data
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Automatically assign logged-in user
        $validated['user_id'] = auth()->id();

        // Create review
        Review::create($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review added successfully.');
    }


    // =========================================================
    // EDIT REVIEW PAGE
    // =========================================================

    public function edit(Review $review)
    {
        // Only review owner can update
        $this->authorize('update', $review);

        return 'Edit Review Page';
    }


    // =========================================================
    // UPDATE REVIEW
    // =========================================================

    public function update(Request $request, Review $review)
    {
        // Only review owner can update
        $this->authorize('update', $review);

        // Validate updated data
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Update review
        $review->update($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully.');
    }


    // =========================================================
    // DELETE REVIEW
    // =========================================================

    public function destroy(Review $review)
    {
        // Owner can delete own review
        // Admin can delete any review
        $this->authorize('delete', $review);

        // Delete review
        $review->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
