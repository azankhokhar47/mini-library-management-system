<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Author::class);

        $authors = Author::withCount('books')
            ->orderBy('name')
            ->paginate(10);

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $this->authorize('create', Author::class);

        return view('authors.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Author::class);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Author::create($validated);

        return redirect()
            ->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    public function edit(Author $author)
    {
        $this->authorize('update', $author);

        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $this->authorize('update', $author);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $author->update($validated);

        return redirect()
            ->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $this->authorize('delete', $author);

        if ($author->books()->exists()) {
            return back()->with(
                'error',
                'This author cannot be deleted because books are associated with this author.'
            );
        }

        $author->delete();

        return redirect()
            ->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
