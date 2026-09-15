<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Book | Mini Library</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        background: #f4f7fb;
        color: #1e293b;
        min-height: 100vh;
    }

    /* ================= SIDEBAR ================= */

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 235px;
        height: 100vh;
        background: #ffffff;
        border-right: 1px solid #e2e8f0;
        padding: 25px 16px;
        box-shadow: 4px 0 15px rgba(15, 23, 42, 0.04);
        z-index: 100;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 35px;
        padding: 0 5px;
    }

    .brand-icon {
        width: 44px;
        height: 44px;
        background: #2563eb;
        color: #ffffff;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .brand h2 {
        font-size: 19px;
        color: #172554;
    }

    .brand h2 span {
        color: #2563eb;
    }

    .menu-title {
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        letter-spacing: 1px;
        margin: 0 10px 10px;
        text-transform: uppercase;
    }

    .menu {
        list-style: none;
    }

    .menu li {
        margin-bottom: 5px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 13px;
        border-radius: 11px;
        text-decoration: none;
        color: #475569;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s;
    }

    .menu a:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    .menu a.active {
        background: #2563eb;
        color: #ffffff;
    }

    .menu-icon {
        width: 22px;
        text-align: center;
        font-size: 17px;
    }

    .logout {
        position: absolute;
        bottom: 25px;
        left: 16px;
        right: 16px;
    }

    .logout button {
        width: 100%;
        border: none;
        background: transparent;
        color: #dc2626;
        padding: 11px 13px;
        border-radius: 11px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logout button:hover {
        background: #fef2f2;
    }

    /* ================= MAIN ================= */

    .main {
        margin-left: 235px;
        padding: 30px 35px;
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 28px;
        gap: 20px;
    }

    .page-title h1 {
        color: #172554;
        font-size: 28px;
        margin-bottom: 7px;
    }

    .page-title p {
        color: #64748b;
        font-size: 14px;
    }

    .user-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 8px 13px 8px 8px;
        border-radius: 30px;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
    }

    .avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #2563eb;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .user-info strong {
        display: block;
        color: #1e293b;
        font-size: 13px;
    }

    .user-info span {
        display: block;
        color: #64748b;
        font-size: 11px;
        margin-top: 2px;
    }

    /* ================= FORM CARD ================= */

    .card {
        max-width: 750px;
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
    }

    .card-header {
        margin-bottom: 25px;
    }

    .card-header h2 {
        color: #1d4ed8;
        font-size: 23px;
        margin-bottom: 6px;
    }

    .card-header p {
        color: #64748b;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 19px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #334155;
        font-size: 14px;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        font-size: 14px;
        outline: none;
        background: #ffffff;
        color: #1e293b;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
    }

    .required {
        color: #dc2626;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 26px;
    }

    .btn {
        border: none;
        border-radius: 9px;
        padding: 11px 20px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: #2563eb;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #334155;
    }

    .btn-secondary:hover {
        background: #cbd5e1;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 800px) {

        .sidebar {
            width: 70px;
            padding: 25px 10px;
        }

        .brand {
            justify-content: center;
            padding: 0;
        }

        .brand h2,
        .menu-title,
        .menu a span:not(.menu-icon),
        .logout button span:not(.menu-icon) {
            display: none;
        }

        .menu a {
            justify-content: center;
            padding: 12px;
        }

        .menu-icon {
            font-size: 19px;
        }

        .logout {
            left: 10px;
            right: 10px;
        }

        .logout button {
            justify-content: center;
        }

        .main {
            margin-left: 70px;
            padding: 25px 20px;
        }

        .topbar {
            flex-direction: column;
        }

        .card {
            max-width: 100%;
        }
    }

    @media (max-width: 600px) {

        .main {
            padding: 20px 15px;
        }

        .page-title h1 {
            font-size: 24px;
        }

        .card {
            padding: 22px;
        }

        .actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

</head>

<body>

{{-- ================= SIDEBAR ================= --}}

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">📚</div>

        <h2>
            Mini <span>Library</span>
        </h2>
    </div>

    <div class="menu-title">
        Library Menu
    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('dashboard') }}">
                <span class="menu-icon">🏠</span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('books.index') }}" class="active">
                <span class="menu-icon">📚</span>
                <span>Books</span>
            </a>
        </li>

        <li>
            <a href="{{ route('authors.index') }}">
                <span class="menu-icon">✍️</span>
                <span>Authors</span>
            </a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}">
                <span class="menu-icon">🗂️</span>
                <span>Categories</span>
            </a>
        </li>

        <li>
            <a href="{{ route('loans.index') }}">
                <span class="menu-icon">📖</span>
                <span>Loans</span>
            </a>
        </li>

        <li>
            <a href="{{ route('reviews.index') }}">
                <span class="menu-icon">⭐</span>
                <span>Reviews</span>
            </a>
        </li>

        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('users.index') }}">
                    <span class="menu-icon">👥</span>
                    <span>Users</span>
                </a>
            </li>
        @endif

    </ul>

    <div class="logout">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">
                <span class="menu-icon">🚪</span>
                <span>Logout</span>
            </button>
        </form>

    </div>

</aside>


{{-- ================= MAIN CONTENT ================= --}}

<main class="main">

    <div class="topbar">

        <div class="page-title">
            <h1>Add New Book</h1>

            <p>
                Add a new book to the Mini Library collection.
            </p>
        </div>

        <div class="user-pill">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <span>{{ ucfirst(auth()->user()->role) }}</span>
            </div>

        </div>

    </div>


    <div class="card">

        <div class="card-header">
            <h2>Book Information</h2>

            <p>
                Fill in the details below to create a new book.
            </p>
        </div>


        <form action="{{ route('books.store') }}" method="POST">

            @csrf


            {{-- Title --}}

            <div class="form-group">

                <label for="title">
                    Book Title <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter book title"
                    required
                >

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- ISBN --}}

            <div class="form-group">

                <label for="isbn">
                    ISBN <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="isbn"
                    name="isbn"
                    value="{{ old('isbn') }}"
                    placeholder="Enter ISBN"
                    required
                >

                @error('isbn')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- Author --}}

            <div class="form-group">

                <label for="author_id">
                    Author <span class="required">*</span>
                </label>

                <select
                    id="author_id"
                    name="author_id"
                    required
                >

                    <option value="">
                        Select Author
                    </option>

                    @foreach($authors as $author)

                        <option
                            value="{{ $author->id }}"
                            {{ old('author_id') == $author->id ? 'selected' : '' }}
                        >
                            {{ $author->name }}
                        </option>

                    @endforeach

                </select>

                @error('author_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- Category --}}

            <div class="form-group">

                <label for="category_id">
                    Category <span class="required">*</span>
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- Stock --}}

            <div class="form-group">

                <label for="stock">
                    Stock <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', 0) }}"
                    min="0"
                    required
                >

                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- Description --}}

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter book description"
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- Actions --}}

            <div class="actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Book
                </button>

                <a
                    href="{{ route('books.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>
