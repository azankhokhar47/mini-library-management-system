<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request, Book $book)
    {
        $this->authorize('create', Review::class);

        $review = Review::create([
            'user_id' => $request->user()->id,
            'book_id' => $book->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $review->load(['user', 'book']);

        return (new ReviewResource($review))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $this->authorize('update', $review);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $review->load(['user', 'book']);

        return new ReviewResource($review);
    }

    public function destroy(Request $request, Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return response()->json([
            'message' => 'Review deleted successfully.'
        ]);
    }
}
