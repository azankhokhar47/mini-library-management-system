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
    // =========================================================
    // MY LOANS
    // GET /api/my-loans
    // =========================================================

    public function myLoans(Request $request)
    {
        $loans = $request->user()
            ->loans()
            ->with('book')
            ->latest()
            ->paginate(10);

        return LoanResource::collection($loans);
    }


    // =========================================================
    // BORROW BOOK
    // POST /api/books/{book}/borrow
    // =========================================================

    public function borrow(Request $request, Book $book)
    {
        $user = $request->user();

        // Only members can borrow books
        if ($user->role !== 'member') {

            return response()->json([
                'message' => 'Only members can borrow books.'
            ], 403);
        }


        // Create loan + decrease stock inside transaction
        $loan = DB::transaction(function () use ($book, $user) {

            // Lock book row to prevent stock race conditions
            $book = Book::where('id', $book->id)
                ->lockForUpdate()
                ->firstOrFail();


            // -----------------------------------------------------
            // Check book stock
            // -----------------------------------------------------

            if ($book->stock <= 0) {

                abort(response()->json([
                    'message' => 'This book is currently unavailable.'
                ], 422));
            }


            // -----------------------------------------------------
            // Maximum 3 active loans
            // -----------------------------------------------------

            $activeLoans = Loan::where('user_id', $user->id)
                ->whereNull('returned_at')
                ->count();

            if ($activeLoans >= 3) {

                abort(response()->json([
                    'message' => 'You can only have 3 active loans.'
                ], 422));
            }


            // -----------------------------------------------------
            // Same book cannot be borrowed twice
            // -----------------------------------------------------

            $alreadyBorrowed = Loan::where('user_id', $user->id)
                ->where('book_id', $book->id)
                ->whereNull('returned_at')
                ->exists();

            if ($alreadyBorrowed) {

                abort(response()->json([
                    'message' => 'You have already borrowed this book.'
                ], 422));
            }


            // -----------------------------------------------------
            // Create loan
            // -----------------------------------------------------

            $borrowedAt = now();

            $loan = Loan::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => $borrowedAt,
                'due_at' => $borrowedAt->copy()->addDays(14),
                'returned_at' => null,
            ]);


            // -----------------------------------------------------
            // Decrease stock after valid loan
            // -----------------------------------------------------

            $book->decrement('stock');


            return $loan;
        });


        // Load book relationship
        $loan->load('book');


        // 201 Created
        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(201);
    }


    // =========================================================
    // RETURN BOOK
    // POST /api/loans/{loan}/return
    // =========================================================

    public function returnBook(Request $request, Loan $loan)
    {
        // ---------------------------------------------------------
        // LoanPolicy authorization
        // ---------------------------------------------------------

        $this->authorize('returnBook', $loan);


        // ---------------------------------------------------------
        // Check if already returned
        // ---------------------------------------------------------

        if ($loan->returned_at !== null) {

            return response()->json([
                'message' => 'This book has already been returned.'
            ], 422);
        }


        // ---------------------------------------------------------
        // Return loan + increase stock
        // ---------------------------------------------------------

        DB::transaction(function () use ($loan) {

            // Lock loan row
            $loan = Loan::where('id', $loan->id)
                ->lockForUpdate()
                ->firstOrFail();


            // Prevent double return
            if ($loan->returned_at !== null) {

                abort(response()->json([
                    'message' => 'This book has already been returned.'
                ], 422));
            }


            // Set returned timestamp
            $loan->update([
                'returned_at' => now(),
            ]);


            // Increase stock exactly once
            $loan->book()->increment('stock');
        });


        // Load book relationship
        $loan->load('book');


        // Return updated loan
        return new LoanResource($loan);
    }
}
