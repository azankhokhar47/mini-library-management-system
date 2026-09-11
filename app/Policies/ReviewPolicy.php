<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    /**
     * Create a review.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Update a review.
     */
    public function update(User $user, Review $review): bool
    {
        return $review->user_id === $user->id;
    }

    /**
     * Delete a review.
     */
    public function delete(User $user, Review $review): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return $review->user_id === $user->id;
    }
}
