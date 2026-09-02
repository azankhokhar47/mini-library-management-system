<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')
            ->orderBy('name')
            ->get();

        return response()->json([
            'data' => $authors
        ]);
    }
}
