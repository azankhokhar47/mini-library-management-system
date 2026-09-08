<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    // =========================================================
    // SHOW LOANS
    // =========================================================

    public function index()
    {
        // LoanPolicy: Member, Librarian, Admin
        $this->authorize('viewAny', Loan::class);

        $user = auth()->user();

        // Member sirf apne loans dekh sakta hai
        if ($user->role === 'member') {

            $loans = Loan::where('user_id', $user->id)
                ->with(['book', 'user'])
                ->latest()
                ->paginate(10);

        } else {

            // Librarian + Admin all loans dekh sakte hain
            $loans = Loan::with(['book', 'user'])
                ->latest()
                ->paginate(10);
        }

        return view('loans.index', compact('loans'));
    }


    // =========================================================
    // VIEW SINGLE LOAN
    // =========================================================

    public function show(Loan $loan)
    {
        $this->authorize('view', $loan);

        return view('loans.show', compact('loan'));
    }


    // =========================================================
    // BORROW BOOK
    // =========================================================

    public function borrow(Book $book)
    {
        $user = auth()->user();

        // Only members can borrow books
        if ($user->role !== 'member') {
            abort(403);
        }


        // Check book stock
        if ($book->stock <= 0) {

            return back()->with(
                'error',
                'This book is currently unavailable.'
            );
        }


        // Member can have maximum 3 active loans
        $activeLoans = Loan::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->count();

        if ($activeLoans >= 3) {

            return back()->with(
                'error',
                'You can only have 3 active loans.'
            );
        }


        // Same book cannot be borrowed twice
        $alreadyBorrowed = Loan::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->exists();

        if ($alreadyBorrowed) {

            return back()->with(
                'error',
                'You have already borrowed this book.'
            );
        }


        // Create loan + decrease stock
        DB::transaction(function () use ($book, $user) {

            $borrowedAt = now();

            Loan::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => $borrowedAt,
                'due_at' => $borrowedAt->copy()->addDays(14),
                'returned_at' => null,
            ]);

            // Decrease stock only after valid loan
            $book->decrement('stock');
        });


        return back()->with(
            'success',
            'Book borrowed successfully.'
        );
    }


    // =========================================================
    // RETURN BOOK
    // =========================================================

    public function returnBook(Loan $loan)
    {
        // LoanPolicy: Member can return own loan,
        // Librarian/Admin can return any loan
        $this->authorize('returnBook', $loan);


        // Check if already returned
        if ($loan->returned_at !== null) {

            return back()->with(
                'error',
                'This book has already been returned.'
            );
        }


        // Return book
        DB::transaction(function () use ($loan) {

            // Set returned timestamp
            $loan->update([
                'returned_at' => now(),
            ]);

            // Increase stock exactly once
            $loan->book()->increment('stock');
        });


        return back()->with(
            'success',
            'Book returned successfully.'
        );
    }
}
