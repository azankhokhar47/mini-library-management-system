<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Admin Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f8fc;
            color: #1e293b;
        }

        body::before {
            content: "";
            position: fixed;
            width: 400px;
            height: 400px;
            background: #3b82f6;
            filter: blur(160px);
            opacity: .07;
            top: -180px;
            left: -150px;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;
            background: #60a5fa;
            filter: blur(160px);
            opacity: .07;
            bottom: -160px;
            right: -120px;
            pointer-events: none;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;

            background: linear-gradient(
                160deg,
                #ffffff,
                #eff6ff
            );

            border-right: 1px solid #dbe5f0;

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

            box-shadow:
                0 7px 18px rgba(37, 99, 235, .18);
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

            color: #64748b;

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

            color: #475569;

            font-size: 14px;

            transition: .2s;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
            transform: translateX(2px);
        }

        .menu a.active {
            background: #2563eb;
            color: #ffffff;
            font-weight: 600;

            box-shadow:
                0 6px 15px rgba(37, 99, 235, .20);
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

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 13px;

            color: #dc2626;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;
        }

        .logout:hover {
            background: #fef2f2;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 235px;

            min-height: 100vh;

            padding: 30px 35px;

            position: relative;
            z-index: 2;
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

            border: 1px solid #dbe5f0;

            padding: 7px 12px;

            border-radius: 30px;

            box-shadow:
                0 5px 15px rgba(30, 64, 175, .05);
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
            color: #64748b;
        }

        /* ================= WELCOME ================= */

        .welcome {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1e40af
            );

            border-radius: 19px;

            padding: 27px 30px;

            margin-bottom: 22px;

            position: relative;
            overflow: hidden;

            box-shadow:
                0 12px 30px rgba(37, 99, 235, .18);
        }

        .welcome::after {
            content: "🛡️";

            position: absolute;

            right: 40px;
            top: 12px;

            font-size: 85px;

            opacity: .15;
        }

        .welcome h2 {
            font-size: 23px;
            color: #ffffff;

            margin-bottom: 7px;
        }

        .welcome p {
            max-width: 600px;

            font-size: 13px;

            line-height: 1.6;

            color: #dbeafe;
        }

        /* ================= STATS ================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 17px;

            margin-bottom: 22px;
        }

        .stat {
            background: #ffffff;

            border: 1px solid #dbe5f0;

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

            color: #64748b;

            font-size: 10px;

            margin-bottom: 4px;
        }

        .stat strong {
            font-size: 22px;

            color: #172554;
        }

        /* ================= CONTENT ================= */

        .content {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;

            margin-bottom: 18px;
        }

        .card {
            background: #ffffff;

            border: 1px solid #dbe5f0;

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

            color: #172554;
        }

        .view {
            font-size: 12px;

            color: #2563eb;

            text-decoration: none;

            font-weight: 600;
        }

        .view:hover {
            text-decoration: underline;
        }

        /* ================= TABLE ================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;

            padding: 9px 5px;

            font-size: 10px;

            color: #64748b;

            border-bottom: 1px solid #dbe5f0;
        }

        td {
            padding: 12px 5px;

            font-size: 12px;

            color: #475569;

            border-bottom: 1px solid #edf2f7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .empty {
            text-align: center;
            color: #94a3b8;
            padding: 20px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1050px) {

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
            .logout {
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
        <div class="brand-icon">📚</div>

        <h2>
            Mini <span>Library</span>
        </h2>
    </div>

    <div class="menu-title">
        Admin Menu
    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="active">
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

        <li>
            <a href="{{ route('users.index') }}">
                <span class="menu-icon">👤</span>
                <span>Users</span>
            </a>
        </li>

    </ul>

    <form method="POST" action="{{ route('logout') }}" class="logout">
        @csrf

        <button
            type="submit"
            style="
                border:none;
                background:none;
                color:inherit;
                display:flex;
                align-items:center;
                gap:12px;
                cursor:pointer;
                font-size:14px;
                width:100%;
            "
        >
            <span class="menu-icon">🚪</span>
            <span>Logout</span>
        </button>
    </form>

</aside>

<main class="main">

    <div class="top">

        <div>
            <h1>Admin Dashboard</h1>

            <p>
                Manage the Mini Library system
            </p>
        </div>

        <div class="user">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>

            <div>
                <strong>
                    {{ auth()->user()->name ?? 'Admin' }}
                </strong>

                <span>
                    Administrator
                </span>
            </div>

        </div>

    </div>

    <div class="welcome">

        <h2>
            Welcome, {{ auth()->user()->name ?? 'Admin' }} 👋
        </h2>

        <p>
            Manage books, authors, categories, loans, reviews
            and users from the Mini Library administration panel.
        </p>

    </div>

    <!-- REQUIRED DASHBOARD METRICS -->

    <div class="stats">

        <div class="stat">
            <div class="stat-icon">📖</div>

            <div>
                <small>Total Books</small>

                <strong>
                    {{ $totalBooks ?? 0 }}
                </strong>
            </div>
        </div>

        <div class="stat">
            <div class="stat-icon">👥</div>

            <div>
                <small>Total Members</small>

                <strong>
                    {{ $totalMembers ?? 0 }}
                </strong>
            </div>
        </div>

        <div class="stat">
            <div class="stat-icon">🔄</div>

            <div>
                <small>Currently Borrowed</small>

                <strong>
                    {{ $borrowedBooks ?? 0 }}
                </strong>
            </div>
        </div>

        <div class="stat">
            <div class="stat-icon">⏰</div>

            <div>
                <small>Overdue Loans</small>

                <strong>
                    {{ $overdueLoans ?? 0 }}
                </strong>
            </div>
        </div>

    </div>

    <div class="content">

        <!-- MOST BORROWED -->

        <div class="card">

            <div class="card-head">

                <h3>
                    Top 5 Most Borrowed Books
                </h3>

                <a href="{{ route('books.index') }}" class="view">
                    Books
                </a>

            </div>

            <table>

                <thead>
                <tr>
                    <th>Book</th>
                    <th>Borrowed</th>
                </tr>
                </thead>

                <tbody>

                @forelse(($mostBorrowedBooks ?? []) as $book)

                    <tr>

                        <td>
                            {{ $book->title }}
                        </td>

                        <td>
                            {{ $book->loans_count ?? 0 }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="2" class="empty">
                            No borrowing data available.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <!-- HIGHEST RATED -->

        <div class="card">

            <div class="card-head">

                <h3>
                    Top 5 Highest Rated Books
                </h3>

                <a href="{{ route('reviews.index') }}" class="view">
                    Reviews
                </a>

            </div>

            <table>

                <thead>
                <tr>
                    <th>Book</th>
                    <th>Rating</th>
                </tr>
                </thead>

                <tbody>

                @forelse(($highestRatedBooks ?? []) as $book)

                    <tr>

                        <td>
                            {{ $book->title }}
                        </td>

                        <td>
                            {{ number_format($book->reviews_avg_rating ?? 0, 1) }}/5
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="2" class="empty">
                            No rating data available.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</main>

</body>
</html>
