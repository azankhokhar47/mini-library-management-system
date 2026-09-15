<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reviews - Mini Library</title>

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

        .content-card {
            background: white;
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 19px;
            color: #172554;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            padding: 9px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            color: white;
        }

        .btn-primary {
            background: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-edit {
            background: #0ea5e9;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 15px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #eff6ff;
            color: #1e40af;
            padding: 13px;
            text-align: left;
            font-size: 13px;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover td {
            background: #f8fafc;
        }

        .rating {
            color: #d97706;
            font-weight: bold;
        }

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

        .pagination {
            margin-top: 20px;
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

            .topbar {
                gap: 15px;
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
            <h1>Reviews</h1>
            <p>Manage your library reviews.</p>
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


    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif


    <div class="content-card">

        <div class="card-header">

            <h2>All Reviews</h2>

            @can('create', App\Models\Review::class)
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                    + Add Review
                </a>
            @endcan

        </div>


        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book</th>
                        <th>Member</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($reviews as $review)

                        <tr>

                            <td>
                                {{ $reviews->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $review->book->title ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $review->user->name ?? 'N/A' }}
                            </td>

                            <td class="rating">
                                {{ $review->rating }}/5
                            </td>

                            <td>
                                {{ $review->comment ?? 'No comment' }}
                            </td>

                            <td>

                                <div class="actions">

                                    @can('update', $review)
                                        <a href="{{ route('reviews.edit', $review) }}"
                                           class="btn btn-edit">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('delete', $review)
                                        <form action="{{ route('reviews.destroy', $review) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this review?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-delete">
                                                Delete
                                            </button>

                                        </form>
                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">
                                No reviews found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="pagination">
            {{ $reviews->links() }}
        </div>

    </div>

</main>

</body>
</html>
