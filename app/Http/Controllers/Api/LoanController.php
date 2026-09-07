<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    // ==========================================
    // MY LOANS
    // GET /api/my-loans
    // ==========================================

    public function myLoans(Request $request)
    {
        $loans = $request->user()
            ->loans()
            ->with('book')
            ->latest()
            ->paginate(10);

        return LoanResource::collection($loans);
    }


    // ==========================================
    // BORROW BOOK
    // POST /api/books/{book}/borrow
    // ==========================================

    public function borrow(Request $request, Book $book)
    {
        $user = $request->user();

        // 1. Check book stock
        if ($book->stock <= 0) {
            return response()->json([
                'message' => 'This book is currently unavailable.'
            ], 422);
        }

        // 2. Maximum 3 active loans
        $activeLoans = Loan::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->count();

        if ($activeLoans >= 3) {
            return response()->json([
                'message' => 'You can only have 3 active loans.'
            ], 422);
        }

        // 3. Same book cannot be borrowed twice
        $alreadyBorrowed = Loan::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->exists();

        if ($alreadyBorrowed) {
            return response()->json([
                'message' => 'You have already borrowed this book.'
            ], 422);
        }

        // 4. Create loan + decrease stock
        $loan = DB::transaction(function () use ($book, $user) {

            $borrowedAt = now();

            $loan = Loan::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => $borrowedAt,
                'due_at' => $borrowedAt->copy()->addDays(14),
                'returned_at' => null,
            ]);

            $book->decrement('stock');

            return $loan;
        });

        // Load book for LoanResource
        $loan->load('book');

        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(201);
    }

    // ==========================================
// RETURN BOOK
// POST /api/loans/{loan}/return
// ==========================================

public function returnBook(Request $request, Loan $loan)
{
    $user = $request->user();

    // 1. Check authorization
    // Member can return only their own loan
    // Admin and Librarian can return any loan
    if ($user->role === 'member' && $loan->user_id !== $user->id) {
        return response()->json([
            'message' => 'You are not authorized to return this loan.'
        ], 403);
    }

    // 2. Check if already returned
    if ($loan->returned_at !== null) {
        return response()->json([
            'message' => 'This book has already been returned.'
        ], 422);
    }

    // 3. Return loan + increase stock
    DB::transaction(function () use ($loan) {

        $loan->update([
            'returned_at' => now(),
        ]);

        $loan->book->increment('stock');
    });

    // Load book for LoanResource
    $loan->load('book');

    return new LoanResource($loan);
}
}
