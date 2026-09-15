<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Author | Mini Library</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
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
        color: white;
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
        color: white;
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
        margin-bottom: 30px;
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
        color: white;
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

    .page-title {
        margin-bottom: 20px;
    }

    .page-title h2 {
        font-size: 22px;
        color: #172554;
        margin-bottom: 5px;
    }

    .page-title p {
        font-size: 13px;
        color: #64748b;
    }

    .card {
        width: 100%;
        max-width: 650px;
        background: white;
        padding: 30px;
        border-radius: 15px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 6px 20px rgba(15, 23, 42, .06);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }

    input {
        width: 100%;
        padding: 12px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        margin-bottom: 8px;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    .error {
        color: #dc2626;
        margin-bottom: 15px;
        font-size: 13px;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 11px 18px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .save {
        background: #2563eb;
        color: white;
    }

    .save:hover {
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

        .card {
            max-width: 100%;
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
        <a href="{{ route('authors.index') }}" class="active">
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
        <a href="{{ route('loans.index') }}">
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
        <h1>Authors</h1>

        <p>
            Add a new author to the library
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


<div class="page-title">

    <h2>
        Add Author
    </h2>

    <p>
        Enter the author name below.
    </p>

</div>


<div class="card">

    <form
        action="{{ route('authors.store') }}"
        method="POST"
    >

        @csrf

        <label for="name">
            Author Name
        </label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter author name"
            required
        >

        @error('name')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <div class="buttons">

            <button
                type="submit"
                class="btn save"
            >
                Save Author
            </button>

            <a
                href="{{ route('authors.index') }}"
                class="btn back"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

</main>

</body>
</html>
