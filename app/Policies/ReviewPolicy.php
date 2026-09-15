<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    /**
     * View all reviews.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member',
        ]);
    }

    /**
     * Create a review.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member',
        ]);
    }

    /**
     * Update a review.
     *
     * Admin and Librarian can edit any review.
     * Member can edit only their own review.
     */
    public function update(User $user, Review $review): bool
    {
        if (in_array($user->role, ['admin', 'librarian'])) {
            return true;
        }

        return $review->user_id === $user->id;
    }

    /**
     * Delete a review.
     *
     * Admin can delete any review.
     * Member can delete only their own review.
     * Librarian cannot delete reviews.
     */
    public function delete(User $user, Review $review): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return $review->user_id === $user->id;
    }
}
