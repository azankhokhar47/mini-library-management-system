<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Member Dashboard</title>

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
            color: #1f2937;
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
                #eef4fb
            );

            border-right: 1px solid #dbe4ef;

            padding: 25px 16px;

            z-index: 10;

            box-shadow:
                5px 0 25px rgba(30, 64, 100, .05);
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
                0 8px 20px rgba(37, 99, 235, .20);
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

            border-radius: 10px;

            text-decoration: none;

            color: #475569;

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

            box-shadow:
                0 7px 18px rgba(37, 99, 235, .20);
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

            color: #172554;

            margin-bottom: 5px;
        }

        .top p {
            font-size: 13px;

            color: #64748b;
        }

        /* ================= USER ================= */

        .user {
            display: flex;

            align-items: center;

            gap: 10px;

            background: #ffffff;

            border: 1px solid #dbe4ef;

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

            color: #1e293b;
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
                #60a5fa
            );

            border-radius: 19px;

            padding: 27px 30px;

            margin-bottom: 22px;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 14px 30px rgba(37, 99, 235, .15);
        }

        .welcome::after {
            content: "📚";

            position: absolute;

            right: 40px;
            top: 12px;

            font-size: 85px;

            opacity: .18;
        }

        .welcome h2 {
            font-size: 23px;

            color: #ffffff;

            margin-bottom: 7px;
        }

        .welcome p {
            max-width: 560px;

            font-size: 13px;

            line-height: 1.6;

            color: #eff6ff;
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

            border: 1px solid #dbe4ef;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 14px;

            box-shadow:
                0 8px 20px rgba(30, 64, 100, .06);
        }

        .stat-icon {
            width: 47px;
            height: 47px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: #dbeafe;

            color: #2563eb;

            font-size: 21px;
        }

        .stat small {
            display: block;

            color: #64748b;

            font-size: 11px;

            margin-bottom: 4px;
        }

        .stat strong {
            font-size: 23px;

            color: #172554;
        }

        /* ================= CONTENT ================= */

        .content {
            display: grid;

            grid-template-columns: 1.6fr 1fr;

            gap: 18px;
        }

        .card {
            background: #ffffff;

            border: 1px solid #dbe4ef;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px rgba(30, 64, 100, .06);
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

            color: #94a3b8;

            border-bottom: 1px solid #e2e8f0;

            text-transform: uppercase;
        }

        td {
            padding: 13px 5px;

            font-size: 12px;

            color: #475569;

            border-bottom: 1px solid #eef2f7;
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

        /* ================= QUICK ACTIONS ================= */

        .actions {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 11px;
        }

        .action {
            padding: 17px 10px;

            text-align: center;

            text-decoration: none;

            color: #475569;

            background: #f8fafc;

            border: 1px solid #dbe4ef;

            border-radius: 13px;

            transition: .2s;
        }

        .action:hover {
            transform: translateY(-2px);

            background: #eff6ff;

            border-color: #bfdbfe;

            color: #2563eb;
        }

        .action-icon {
            font-size: 23px;

            margin-bottom: 7px;
        }

        .action span {
            font-size: 11px;

            font-weight: 600;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 950px) {

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
        Member Menu
    </div>

    <ul class="menu">

        <li>

            <a
                href="{{ route('member.dashboard') }}"
                class="active"
            >

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>

        </li>

        <li>

            <a href="{{ route('books.index') }}">

                <span class="menu-icon">
                    📖
                </span>

                <span>
                    Books
                </span>

            </a>

        </li>

        <li>

            <a href="{{ route('loans.index') }}">

                <span class="menu-icon">
                    🔄
                </span>

                <span>
                    My Loans
                </span>

            </a>

        </li>

        <li>

            <a href="{{ route('reviews.index') }}">

                <span class="menu-icon">
                    ⭐
                </span>

                <span>
                    My Reviews
                </span>

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
                Member Dashboard
            </h1>

            <p>
                Explore books and manage your library loans
            </p>

        </div>

        <div class="user">

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        auth()->user()->name ?? 'M',
                        0,
                        1
                    )
                ) }}

            </div>

            <div>

                <strong>
                    {{ auth()->user()->name ?? 'Member' }}
                </strong>

                <span>
                    Library Member
                </span>

            </div>

        </div>

    </div>

    <div class="welcome">

        <h2>
            Welcome, {{ auth()->user()->name ?? 'Member' }} 👋
        </h2>

        <p>
            Browse available books, keep track of your active
            loans and write reviews about the books you read.
        </p>

    </div>

    <!-- MEMBER STATS -->

    <div class="stats">

        <div class="stat">

            <div class="stat-icon">
                📖
            </div>

            <div>

                <small>
                    Available Books
                </small>

                <strong>
                    {{ $availableBooks ?? 0 }}
                </strong>

            </div>

        </div>

        <div class="stat">

            <div class="stat-icon">
                🔄
            </div>

            <div>

                <small>
                    My Active Loans
                </small>

                <strong>
                    {{ $activeLoans ?? 0 }}
                </strong>

            </div>

        </div>

        <div class="stat">

            <div class="stat-icon">
                ⭐
            </div>

            <div>

                <small>
                    My Reviews
                </small>

                <strong>
                    {{ $myReviews ?? 0 }}
                </strong>

            </div>

        </div>

    </div>

    <div class="content">

        <!-- RECENT LOANS -->

        <div class="card">

            <div class="card-head">

                <h3>
                    My Recent Loans
                </h3>

                <a
                    href="{{ route('loans.index') }}"
                    class="view"
                >
                    View All
                </a>

            </div>

            <table>

                <thead>

                <tr>

                    <th>
                        Book
                    </th>

                    <th>
                        Due Date
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
                            {{ $loan->book->title ?? 'Book' }}
                        </td>

                        <td>
                            {{ $loan->due_at
                                ? \Carbon\Carbon::parse($loan->due_at)->format('d M Y')
                                : '-' }}
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
                            You have no loans yet.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <!-- QUICK ACTIONS -->

        <div class="card">

            <div class="card-head">

                <h3>
                    Library Actions
                </h3>

            </div>

            <div class="actions">

                <a
                    href="{{ route('books.index') }}"
                    class="action"
                >

                    <div class="action-icon">
                        📚
                    </div>

                    <span>
                        Browse Books
                    </span>

                </a>

                <a
                    href="{{ route('loans.index') }}"
                    class="action"
                >

                    <div class="action-icon">
                        🔄
                    </div>

                    <span>
                        My Loans
                    </span>

                </a>

                <a
                    href="{{ route('reviews.index') }}"
                    class="action"
                >

                    <div class="action-icon">
                        ⭐
                    </div>

                    <span>
                        My Reviews
                    </span>

                </a>

            </div>

        </div>

    </div>

</main>

</body>

</html>
