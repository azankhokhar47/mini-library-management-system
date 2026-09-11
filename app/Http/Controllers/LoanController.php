<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Loan::class);

        $user = auth()->user();

        if ($user->role === 'member') {

            $loans = Loan::where('user_id', $user->id)
                ->with(['book', 'user'])
                ->latest()
                ->paginate(10);

        } else {

            $loans = Loan::with(['book', 'user'])
                ->latest()
                ->paginate(10);
        }

        return view('loans.index', compact('loans'));
    }

    public function show(Loan $loan)
    {
        $this->authorize('view', $loan);

        $loan->load(['book', 'user']);

        return view('loans.show', compact('loan'));
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();

        if ($user->role !== 'member') {
            abort(403);
        }

        $activeLoans = Loan::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->count();

        if ($activeLoans >= 3) {
            return back()->with(
                'error',
                'You can only have 3 active loans.'
            );
        }

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

        DB::transaction(function () use ($book, $user) {

            $book = Book::whereKey($book->id)
                ->lockForUpdate()
                ->first();

            if ($book->stock <= 0) {
                abort(409, 'This book is currently unavailable.');
            }

            $borrowedAt = now();

            Loan::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => $borrowedAt,
                'due_at' => $borrowedAt->copy()->addDays(14),
                'returned_at' => null,
            ]);

            $book->decrement('stock');
        });

        return back()->with(
            'success',
            'Book borrowed successfully.'
        );
    }

    public function return(Loan $loan)
    {
        $this->authorize('returnBook', $loan);

        if ($loan->returned_at !== null) {
            return back()->with(
                'error',
                'This book has already been returned.'
            );
        }

        DB::transaction(function () use ($loan) {

            $loan->update([
                'returned_at' => now(),
            ]);

            $loan->book()->increment('stock');
        });

        return back()->with(
            'success',
            'Book returned successfully.'
        );
    }
}
