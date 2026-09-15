<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Books | Mini Library</title>

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

    /* ================= HEADER ================= */

    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        gap: 15px;
    }

    .header-actions h2 {
        color: #1d4ed8;
        font-size: 22px;
    }

    .add-btn {
        background: #2563eb;
        color: #ffffff;
        padding: 10px 16px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .add-btn:hover {
        background: #1d4ed8;
    }

    /* ================= MESSAGES ================= */

    .message {
        padding: 12px 15px;
        border-radius: 9px;
        margin-bottom: 20px;
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
        font-size: 14px;
    }

    .error {
        padding: 12px 15px;
        border-radius: 9px;
        margin-bottom: 20px;
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
        font-size: 14px;
    }

    /* ================= FILTERS ================= */

    .filters {
        background: #ffffff;
        padding: 20px;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        margin-bottom: 22px;
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
    }

    .filter-form {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr auto auto;
        gap: 10px;
        align-items: end;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .field label {
        font-size: 12px;
        color: #475569;
        font-weight: 700;
    }

    input,
    select {
        width: 100%;
        padding: 10px 11px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        outline: none;
        background: #ffffff;
        color: #1e293b;
    }

    input:focus,
    select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
    }

    .filter-btn {
        background: #2563eb;
        color: #ffffff;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
    }

    .filter-btn:hover {
        background: #1d4ed8;
    }

    .reset-btn {
        background: #64748b;
        color: #ffffff;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        font-weight: 600;
    }

    .reset-btn:hover {
        background: #475569;
    }

    /* ================= TABLE ================= */

    .table-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        overflow-x: auto;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    th,
    td {
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    th {
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 13px;
    }

    td {
        color: #475569;
        font-size: 13px;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
    }

    .edit-btn {
        background: #2563eb;
        color: #ffffff;
        padding: 7px 11px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .edit-btn:hover {
        background: #1d4ed8;
    }

    .delete-btn {
        background: #dc2626;
        color: #ffffff;
        padding: 7px 11px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
    }

    .delete-btn:hover {
        background: #b91c1c;
    }

    .borrow-btn {
        background: #16a34a;
        color: #ffffff;
        padding: 7px 11px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
    }

    .borrow-btn:hover {
        background: #15803d;
    }

    .unavailable {
        color: #dc2626;
        font-weight: 700;
    }

    .available {
        color: #16a34a;
        font-weight: 700;
    }

    .empty {
        text-align: center;
        padding: 35px;
        color: #64748b;
    }

    /* ================= PAGINATION ================= */

    .pagination {
        margin-top: 28px;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .pagination nav {
        display: flex;
        justify-content: center;
    }

    .pagination nav > div {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        padding: 0 12px;
        margin: 3px;
        border-radius: 9px;
        border: 1px solid #dbe3ee;
        background: #ffffff;
        color: #334155;
        text-decoration: none;
        font-size: 12px;
    }

    .pagination a:hover {
        background: #2563eb;
        color: #ffffff;
        border-color: #2563eb;
    }

    .pagination span[aria-current="page"] {
        background: #2563eb;
        color: #ffffff;
        border-color: #2563eb;
    }

    .pagination svg {
        width: 18px;
        height: 18px;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 1100px) {
        .filter-form {
            grid-template-columns: 1fr 1fr 1fr;
        }
    }

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

        .filter-form {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 600px) {

        .main {
            padding: 20px 15px;
        }

        .header-actions {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        .add-btn {
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


{{-- ================= MAIN ================= --}}

<main class="main">

    <div class="topbar">

        <div class="page-title">

            <h1>Books</h1>

            <p>
                Manage and browse the Mini Library collection.
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


    <div class="header-actions">

        <h2>Book Collection</h2>

        @can('create', \App\Models\Book::class)

            <a href="{{ route('books.create') }}" class="add-btn">
                + Add Book
            </a>

        @endcan

    </div>


    @if(session('success'))

        <div class="message">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="error">
            {{ session('error') }}
        </div>

    @endif


    @if($errors->any())

        <div class="error">

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

        </div>

    @endif


    {{-- ================= FILTERS ================= --}}

    <div class="filters">

        <form
            action="{{ route('books.index') }}"
            method="GET"
            class="filter-form"
        >

            <div class="field">

                <label for="search">
                    Search
                </label>

                <input
                    type="text"
                    id="search"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search title or ISBN"
                >

            </div>


            <div class="field">

                <label for="category">
                    Category
                </label>

                <select name="category" id="category">

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->slug }}"
                            {{ request('category') == $category->slug ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="field">

                <label for="author">
                    Author
                </label>

                <select name="author" id="author">

                    <option value="">
                        All Authors
                    </option>

                    @foreach($authors as $author)

                        <option
                            value="{{ $author->id }}"
                            {{ request('author') == $author->id ? 'selected' : '' }}
                        >
                            {{ $author->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="field">

                <label for="available">
                    Availability
                </label>

                <select name="available" id="available">

                    <option value="">
                        All Books
                    </option>

                    <option
                        value="1"
                        {{ request('available') === '1' ? 'selected' : '' }}
                    >
                        Available
                    </option>

                    <option
                        value="0"
                        {{ request('available') === '0' ? 'selected' : '' }}
                    >
                        Unavailable
                    </option>

                </select>

            </div>


            <button type="submit" class="filter-btn">
                Filter
            </button>

            <a
                href="{{ route('books.index') }}"
                class="reset-btn"
            >
                Reset
            </a>

        </form>

    </div>


    {{-- ================= TABLE ================= --}}

    <div class="table-card">

        @if($books->count())

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Borrowed</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($books as $book)

                        <tr>

                            <td>
                                {{ $book->id }}
                            </td>

                            <td>
                                {{ $book->title }}
                            </td>

                            <td>
                                {{ $book->isbn }}
                            </td>

                            <td>
                                {{ $book->author->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $book->category->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $book->stock }}
                            </td>

                            <td>
                                {{ $book->loans_count }}
                            </td>

                            <td>

                                @if($book->stock > 0)

                                    <span class="available">
                                        Available
                                    </span>

                                @else

                                    <span class="unavailable">
                                        Unavailable
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="actions">

                                    @can('update', $book)

                                        <a
                                            href="{{ route('books.edit', $book) }}"
                                            class="edit-btn"
                                        >
                                            Edit
                                        </a>

                                    @endcan


                                    @can('delete', $book)

                                        <form
                                            action="{{ route('books.destroy', $book) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this book?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    @endcan


                                    {{-- Only Members can borrow books --}}

                                    @if($book->stock > 0 && auth()->user()->role === 'member')

                                        <form
                                            action="{{ route('books.borrow', $book) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="borrow-btn"
                                            >
                                                Borrow
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>


            <div class="pagination">
                {{ $books->links() }}
            </div>

        @else

            <div class="empty">
                No books found.
            </div>

        @endif

    </div>

</main>

</body>
</html>
