<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add User - Mini Library</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #172554;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 25px 16px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.03);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 35px;
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
            color: #94a3b8;
            letter-spacing: 1px;
            margin: 0 0 10px 10px;
            text-transform: uppercase;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
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

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
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
            text-align: left;
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
            margin-bottom: 30px;
        }

        .page-title {
            margin: 0;
            font-size: 28px;
        }

        .page-description {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .user-pill {
            background: white;
            padding: 8px 14px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 9px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .card {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }

        input,
        select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 11px 20px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
            }

            .brand-text,
            .menu-title,
            .menu-text,
            .logout-text {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 11px;
            }

            .logout button {
                text-align: center;
            }

            .main {
                margin-left: 70px;
                padding: 25px 20px;
            }

            .topbar {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">📚</div>

        <div class="brand-text">
            Mini <span>Library</span>
        </div>
    </div>

    <p class="menu-title">Menu</p>

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
            <a href="{{ route('reviews.index') }}">
                <span class="menu-icon">⭐</span>
                <span class="menu-text">Reviews</span>
            </a>
        </li>

        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('users.index') }}" class="active">
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
                🚪
                <span class="logout-text">Logout</span>
            </button>
        </form>
    </div>

</aside>


<main class="main">

    <div class="topbar">

        <div>
            <h1 class="page-title">Add New User</h1>

            <p class="page-description">
                Create a new library user
            </p>
        </div>

        <div class="user-pill">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <span>
                {{ auth()->user()->name }}
            </span>
        </div>

    </div>


    <div class="card">

        <form action="{{ route('users.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="name">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter user name"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter email address"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimum 8 characters"
                    required
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="role">Role</label>

                <select id="role" name="role" required>

                    <option value="">Select Role</option>

                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="librarian" {{ old('role') === 'librarian' ? 'selected' : '' }}>
                        Librarian
                    </option>

                    <option value="member" {{ old('role') === 'member' ? 'selected' : '' }}>
                        Member
                    </option>

                </select>

                @error('role')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="buttons">

                <button type="submit" class="btn btn-primary">
                    Create User
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>
