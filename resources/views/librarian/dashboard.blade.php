<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Librarian Dashboard</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f5f9ff;
            color: #1e293b;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 235px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #dbe7f5;

            padding: 25px 16px;

            z-index: 10;

            box-shadow:
                5px 0 20px rgba(30, 64, 175, .05);
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
            color: #1e3a8a;
        }

        .brand h2 span {
            color: #2563eb;
        }

        .menu-title {
            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #7b8da5;

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

            border-radius: 10px;

            text-decoration: none;

            color: #52657d;

            font-size: 14px;

            transition: .2s;
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

        /* ================= LOGOUT ================= */

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

            border: none;

            background: transparent;

            color: #dc2626;

            border-radius: 10px;

            cursor: pointer;

            font-size: 14px;
        }

        .logout button:hover {
            background: #fef2f2;
        }

        /* ================= MAIN ================= */

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

            color: #1e3a8a;

            margin-bottom: 5px;
        }

        .top p {
            font-size: 13px;

            color: #71839a;
        }

        .user {
            display: flex;

            align-items: center;

            gap: 10px;

            background: #ffffff;

            border: 1px solid #dbe7f5;

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

            color: #1e3a8a;
        }

        .user span {
            display: block;

            font-size: 11px;

            color: #7b8da5;
        }

        /* ================= WELCOME ================= */

        .welcome {
            background: linear-gradient(
                135deg,
                #dbeafe,
                #eff6ff
            );

            border: 1px solid #bfdbfe;

            border-radius: 19px;

            padding: 27px 30px;

            margin-bottom: 22px;
        }

        .welcome h2 {
            font-size: 23px;

            color: #1e3a8a;

            margin-bottom: 7px;
        }

        .welcome p {
            max-width: 600px;

            font-size: 13px;

            line-height: 1.6;

            color: #52657d;
        }

        /* ================= STATS ================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 17px;

            margin-bottom: 22px;
        }

        .stat {
            background: #ffffff;

            border: 1px solid #dbe7f5;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 13px;

            box-shadow:
                0 8px 20px rgba(30, 64, 175, .06);
        }

        .stat-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: #dbeafe;

            color: #2563eb;

            font-size: 20px;
        }

        .stat small {
            display: block;

            color: #7b8da5;

            font-size: 10px;

            margin-bottom: 4px;
        }

        .stat strong {
            font-size: 22px;

            color: #1e3a8a;
        }

        /* ================= CONTENT ================= */

        .content {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;
        }

        .card {
            background: #ffffff;

            border: 1px solid #dbe7f5;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px rgba(30, 64, 175, .06);
        }

        .card-head {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 16px;
        }

        .card-head h3 {
            font-size: 16px;

            color: #1e3a8a;
        }

        .view {
            font-size: 12px;

            color: #2563eb;

            text-decoration: none;

            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;

            padding: 9px 5px;

            font-size: 10px;

            color: #71839a;

            border-bottom: 1px solid #dbe7f5;
        }

        td {
            padding: 13px 5px;

            font-size: 12px;

            color: #52657d;

            border-bottom: 1px solid #edf2f7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;

            padding: 5px 9px;

            border-radius: 20px;

            background: #dbeafe;

            color: #1d4ed8;

            font-size: 10px;

            font-weight: 600;
        }

        .returned {
            background: #dcfce7;
            color: #15803d;
        }

        .empty {
            text-align: center;
            color: #94a3b8;
            padding: 20px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .content {
                grid-template-columns: 1fr;
            }
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

            .stats {
                grid-template-columns: 1fr;
            }

            .user {
                display: none;
            }
        }

    </style>

</head>

<body>

<aside class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            📚
        </div>

        <h2>
            Mini <span>Library</span>
        </h2>

    </div>

    <div class="menu-title">
        Librarian Menu
    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('librarian.dashboard') }}" class="active">
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

    </ul>

    <form method="POST" action="{{ route('logout') }}" class="logout">

        @csrf

        <button type="submit">

            <span class="menu-icon">
                🚪
            </span>

            <span>
                Logout
            </span>

        </button>

    </form>

</aside>

<main class="main">

    <div class="top">

        <div>

            <h1>
                Librarian Dashboard
            </h1>

            <p>
                Manage books and library lending activity
            </p>

        </div>

        <div class="user">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'L', 0, 1)) }}
            </div>

            <div>

                <strong>
                    {{ auth()->user()->name ?? 'Librarian' }}
                </strong>

                <span>
                    Library Staff
                </span>

            </div>

        </div>

    </div>

    <div class="welcome">

        <h2>
            Welcome, {{ auth()->user()->name ?? 'Librarian' }} 👋
        </h2>

        <p>
            Manage the library collection, authors, categories,
            loans and reviews from this dashboard.
        </p>

    </div>

    <!-- LIBRARIAN SUMMARY -->

    <div class="stats">

        <div class="stat">

            <div class="stat-icon">
                📖
            </div>

            <div>

                <small>
                    Total Books
                </small>

                <strong>
                    {{ $totalBooks ?? 0 }}
                </strong>

            </div>

        </div>

        <div class="stat">

            <div class="stat-icon">
                🔄
            </div>

            <div>

                <small>
                    Active Loans
                </small>

                <strong>
                    {{ $activeLoans ?? 0 }}
                </strong>

            </div>

        </div>

        <div class="stat">

            <div class="stat-icon">
                ⏰
            </div>

            <div>

                <small>
                    Overdue Loans
                </small>

                <strong>
                    {{ $overdueLoans ?? 0 }}
                </strong>

            </div>

        </div>

    </div>

    <div class="content">

        <!-- RECENT LOANS -->

        <div class="card">

            <div class="card-head">

                <h3>
                    Recent Loans
                </h3>

                <a href="{{ route('loans.index') }}" class="view">
                    View All
                </a>

            </div>

            <table>

                <thead>

                <tr>

                    <th>
                        Member
                    </th>

                    <th>
                        Book
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse(($recentLoans ?? []) as $loan)

                    <tr>

                        <td>
                            {{ $loan->user->name ?? 'Member' }}
                        </td>

                        <td>
                            {{ $loan->book->title ?? 'Book' }}
                        </td>

                        <td>

                            @if($loan->returned_at)

                                <span class="status returned">
                                    Returned
                                </span>

                            @else

                                <span class="status">
                                    Active
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="empty">
                            No recent loans available.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <!-- LIBRARY MANAGEMENT -->

        <div class="card">

            <div class="card-head">

                <h3>
                    Library Management
                </h3>

            </div>

            <table>

                <tbody>

                <tr>

                    <td>
                        📖 Books
                    </td>

                    <td>
                        <a href="{{ route('books.index') }}" class="view">
                            Manage
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        ✍️ Authors
                    </td>

                    <td>
                        <a href="{{ route('authors.index') }}" class="view">
                            Manage
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        🏷️ Categories
                    </td>

                    <td>
                        <a href="{{ route('categories.index') }}" class="view">
                            Manage
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        🔄 Loans
                    </td>

                    <td>
                        <a href="{{ route('loans.index') }}" class="view">
                            Manage
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        ⭐ Reviews
                    </td>

                    <td>
                        <a href="{{ route('reviews.index') }}" class="view">
                            Manage
                        </a>
                    </td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>

</main>

</body>

</html>
