<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoanController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Loan::class);

        $user = auth()->user();

        if ($user->role === 'member') {

            $loans = Loan::where('user_id', $user->id)
                ->with(['book.author', 'user'])
                ->latest()
                ->paginate(10);

        } else {

            $loans = Loan::with(['book.author', 'user'])
                ->latest()
                ->paginate(10);
        }

        return view('loans.index', compact('loans'));
    }


    public function create()
    {
        $this->authorize('create', Loan::class);

        $users = User::where('role', 'member')
            ->orderBy('name')
            ->get();

        $books = Book::where('stock', '>', 0)
            ->orderBy('title')
            ->get();

        return view('loans.create', compact('users', 'books'));
    }


    public function store(Request $request)
    {
        $this->authorize('create', Loan::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
            'borrowed_at' => ['required', 'date'],
            'due_at' => ['required', 'date', 'after_or_equal:borrowed_at'],
        ]);

        DB::transaction(function () use ($validated) {

            $book = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($book->stock <= 0) {
                throw ValidationException::withMessages([
                    'book_id' => 'This book is currently unavailable.',
                ]);
            }

            $activeLoans = Loan::where('user_id', $validated['user_id'])
                ->whereNull('returned_at')
                ->count();

            if ($activeLoans >= 3) {
                throw ValidationException::withMessages([
                    'user_id' => 'This member already has 3 active loans.',
                ]);
            }

            $alreadyBorrowed = Loan::where('user_id', $validated['user_id'])
                ->where('book_id', $validated['book_id'])
                ->whereNull('returned_at')
                ->exists();

            if ($alreadyBorrowed) {
                throw ValidationException::withMessages([
                    'book_id' => 'This member has already borrowed this book.',
                ]);
            }

            Loan::create([
                'user_id' => $validated['user_id'],
                'book_id' => $validated['book_id'],
                'borrowed_at' => $validated['borrowed_at'],
                'due_at' => $validated['due_at'],
                'returned_at' => null,
            ]);

            $book->decrement('stock');
        });

        return redirect()
            ->route('loans.index')
            ->with('success', 'Loan created successfully.');
    }


    public function edit(Loan $loan)
    {
        $this->authorize('update', $loan);

        $loan->load(['user', 'book']);

        $users = User::where('role', 'member')
            ->orderBy('name')
            ->get();

        $books = Book::orderBy('title')
            ->get();

        return view('loans.edit', compact('loan', 'users', 'books'));
    }


    public function update(Request $request, Loan $loan)
    {
        $this->authorize('update', $loan);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
            'borrowed_at' => ['required', 'date'],
            'due_at' => ['required', 'date', 'after_or_equal:borrowed_at'],
            'returned_at' => [
                'nullable',
                'date',
                'after_or_equal:borrowed_at'
            ],
        ]);

        DB::transaction(function () use ($validated, $loan) {

            $oldBookId = $loan->book_id;
            $oldReturned = $loan->returned_at !== null;

            $newBook = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($oldBookId != $validated['book_id']) {

                if (!$oldReturned) {
                    Book::whereKey($oldBookId)->increment('stock');
                }

                if (!$validated['returned_at']) {

                    if ($newBook->stock <= 0) {
                        throw ValidationException::withMessages([
                            'book_id' => 'The selected book is currently unavailable.',
                        ]);
                    }

                    $newBook->decrement('stock');
                }

            } else {

                $newReturned = !empty($validated['returned_at']);

                if (!$oldReturned && $newReturned) {
                    $newBook->increment('stock');
                }

                if ($oldReturned && !$newReturned) {

                    if ($newBook->stock <= 0) {
                        throw ValidationException::withMessages([
                            'book_id' => 'This book is currently unavailable.',
                        ]);
                    }

                    $newBook->decrement('stock');
                }
            }

            $loan->update([
                'user_id' => $validated['user_id'],
                'book_id' => $validated['book_id'],
                'borrowed_at' => $validated['borrowed_at'],
                'due_at' => $validated['due_at'],
                'returned_at' => $validated['returned_at'] ?? null,
            ]);
        });

        return redirect()
            ->route('loans.index')
            ->with('success', 'Loan updated successfully.');
    }


    public function borrow(Book $book)
    {
        $user = auth()->user();

        /*
        | Only Members can borrow books.
        | This follows the assignment borrowing rules.
        */
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
