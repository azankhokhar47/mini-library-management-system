<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Add Loan</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f7fb;
            color: #1e293b;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 25px 16px;
            box-shadow: 5px 0 25px rgba(15, 23, 42, .05);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 5px 10px 30px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #2563eb;
            color: #ffffff;
            font-size: 22px;
        }

        .brand h2 {
            font-size: 20px;
            color: #172554;
        }

        .brand h2 span {
            color: #2563eb;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            padding: 0 12px;
            margin-bottom: 10px;
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
            color: #64748b;
            font-size: 14px;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu a.active {
            background: #2563eb;
            color: #ffffff;
            font-weight: 600;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }

        .logout {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 25px;
        }

        .logout button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            color: #ef4444;
            background: transparent;
            border: none;
            border-radius: 11px;
            font-size: 14px;
            cursor: pointer;
            text-align: left;
        }

        .logout button:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .main {
            margin-left: 235px;
            min-height: 100vh;
            padding: 30px 35px;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 28px;
            color: #172554;
            margin-bottom: 5px;
        }

        .top p {
            font-size: 13px;
            color: #64748b;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 7px 12px;
            border-radius: 30px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #2563eb;
            color: #ffffff;
            font-weight: bold;
        }

        .user strong {
            display: block;
            font-size: 13px;
            color: #172554;
        }

        .user span {
            display: block;
            font-size: 11px;
            color: #94a3b8;
        }

        .page-header {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 19px;
            padding: 25px 28px;
            margin-bottom: 22px;
        }

        .page-header h2 {
            font-size: 22px;
            color: #1e3a8a;
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13px;
            color: #52657d;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            padding: 25px;
            max-width: 800px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, .05);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dbe3ee;
            border-radius: 9px;
            background: #ffffff;
            color: #334155;
            font-size: 13px;
            outline: none;
        }

        .form-group select:focus,
        .form-group input:focus {
            border-color: #2563eb;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 22px;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
            }

            .brand h2,
            .menu-title,
            .menu a span,
            .logout span {
                display: none;
            }

            .menu a,
            .logout button {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

    </style>

</head>

<body>

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
            <a href="{{ route('books.index') }}">
                <span class="menu-icon">📖</span>
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
                <span class="menu-icon">🏷️</span>
                <span>Categories</span>
            </a>
        </li>

        <li>
            <a href="{{ route('loans.index') }}" class="active">
                <span class="menu-icon">🔄</span>
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


<main class="main">

    <div class="top">

        <div>
            <h1>Add Loan</h1>

            <p>
                Create a new library loan
            </p>
        </div>

        <div class="user">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    {{ ucfirst(auth()->user()->role) }}
                </span>

            </div>

        </div>

    </div>


    <div class="page-header">

        <h2>
            Add New Loan 🔄
        </h2>

        <p>
            Select a member and an available book.
        </p>

    </div>


    <div class="form-card">

        <form
            action="{{ route('loans.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="user_id">
                    Member
                </label>

                <select name="user_id" id="user_id">

                    <option value="">
                        Select Member
                    </option>

                    @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id') == $user->id ? 'selected' : '' }}
                        >
                            {{ $user->name }} — {{ $user->email }}
                        </option>

                    @endforeach

                </select>

                @error('user_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="book_id">
                    Book
                </label>

                <select name="book_id" id="book_id">

                    <option value="">
                        Select Book
                    </option>

                    @foreach($books as $book)

                        <option
                            value="{{ $book->id }}"
                            {{ old('book_id') == $book->id ? 'selected' : '' }}
                        >
                            {{ $book->title }} — Stock: {{ $book->stock }}
                        </option>

                    @endforeach

                </select>

                @error('book_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="borrowed_at">
                    Borrowed Date
                </label>

                <input
                    type="date"
                    name="borrowed_at"
                    id="borrowed_at"
                    value="{{ old('borrowed_at', now()->format('Y-m-d')) }}"
                >

                @error('borrowed_at')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="due_at">
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_at"
                    id="due_at"
                    value="{{ old('due_at', now()->addDays(14)->format('Y-m-d')) }}"
                >

                @error('due_at')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Create Loan
                </button>

                <a
                    href="{{ route('loans.index') }}"
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
