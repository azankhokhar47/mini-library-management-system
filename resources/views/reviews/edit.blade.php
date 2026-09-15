<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Review - Mini Library</title>

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
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 25px 16px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.03);
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 35px;
            padding-left: 7px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            background: #2563eb;
            color: white;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand-text {
            font-size: 18px;
            font-weight: bold;
            color: #172554;
        }

        .brand-text span {
            color: #2563eb;
        }

        .menu-title {
            font-size: 11px;
            letter-spacing: 1px;
            color: #94a3b8;
            font-weight: bold;
            margin: 0 10px 10px;
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
            transition: 0.2s;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
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
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border-radius: 11px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #fef2f2;
        }

        .main {
            margin-left: 235px;
            padding: 30px 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .page-title h1 {
            font-size: 28px;
            color: #172554;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #64748b;
            font-size: 14px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 8px 14px 8px 8px;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-name {
            font-size: 13px;
            font-weight: bold;
            color: #334155;
        }

        .user-role {
            font-size: 11px;
            color: #94a3b8;
            text-transform: capitalize;
        }

        .form-card {
            max-width: 650px;
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
        }

        .form-card h2 {
            color: #172554;
            font-size: 20px;
            margin-bottom: 25px;
        }

        .book-info {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #1e40af;
            padding: 12px 14px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: bold;
        }

        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: white;
            color: #334155;
            font-size: 14px;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 10px 17px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .update {
            background: #2563eb;
            color: white;
        }

        .update:hover {
            background: #1d4ed8;
        }

        .back {
            background: #e2e8f0;
            color: #334155;
        }

        .back:hover {
            background: #cbd5e1;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding-left: 0;
            }

            .brand-text,
            .menu-title,
            .menu-text,
            .logout-text {
                display: none;
            }

            .menu a,
            .logout button {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                padding: 25px 20px;
            }

            .page-title h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">📚</div>

        <div class="brand-text">
            Mini <span>Library</span>
        </div>
    </div>

    <div class="menu-title">
        MENU
    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('dashboard') }}">
                <span class="menu-icon">📊</span>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('books.index') }}">
                <span class="menu-icon">📚</span>
                <span class="menu-text">Books</span>
            </a>
        </li>

        <li>
            <a href="{{ route('authors.index') }}">
                <span class="menu-icon">✍️</span>
                <span class="menu-text">Authors</span>
            </a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}">
                <span class="menu-icon">🏷️</span>
                <span class="menu-text">Categories</span>
            </a>
        </li>

        <li>
            <a href="{{ route('loans.index') }}">
                <span class="menu-icon">📖</span>
                <span class="menu-text">Loans</span>
            </a>
        </li>

        <li>
            <a href="{{ route('reviews.index') }}" class="active">
                <span class="menu-icon">⭐</span>
                <span class="menu-text">Reviews</span>
            </a>
        </li>

        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('users.index') }}">
                    <span class="menu-icon">👥</span>
                    <span class="menu-text">Users</span>
                </a>
            </li>
        @endif

    </ul>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">
                <span class="menu-icon">🚪</span>
                <span class="logout-text">Logout</span>
            </button>
        </form>
    </div>

</aside>


<!-- Main -->
<main class="main">

    <div class="topbar">

        <div class="page-title">
            <h1>Edit Review</h1>
            <p>Update your book review.</p>
        </div>

        <div class="user-pill">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ auth()->user()->role }}
                </div>
            </div>
        </div>

    </div>


    <div class="form-card">

        <h2>Edit Review</h2>

        <div class="book-info">
            <strong>Book:</strong>
            {{ $review->book->title ?? 'N/A' }}
        </div>


        <form action="{{ route('reviews.update', $review) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="field">

                <label for="rating">
                    Rating
                </label>

                <select name="rating" id="rating" required>

                    @for($i = 1; $i <= 5; $i++)

                        <option value="{{ $i }}"
                            {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                            {{ $i }}/5
                        </option>

                    @endfor

                </select>

                @error('rating')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="field">

                <label for="comment">
                    Comment
                </label>

                <textarea
                    name="comment"
                    id="comment"
                    placeholder="Write your review..."
                >{{ old('comment', $review->comment) }}</textarea>

                @error('comment')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="buttons">

                <button type="submit" class="btn update">
                    Update Review
                </button>

                <a href="{{ route('reviews.index') }}" class="btn back">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>
