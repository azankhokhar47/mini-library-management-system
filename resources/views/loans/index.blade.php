<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Loans</title>

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

        .page-header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
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

        .add-btn {
            display: inline-block;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .add-btn:hover {
            background: #1d4ed8;
        }

        .message {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .loans-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .loan-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, .05);
        }

        .loan-card:hover {
            border-color: #93c5fd;
        }

        .loan-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 13px;
            font-size: 23px;
            margin-bottom: 15px;
        }

        .loan-title {
            font-size: 17px;
            line-height: 1.4;
            color: #172554;
            margin-bottom: 15px;
            min-height: 48px;
        }

        .loan-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid #e2e8f0;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            font-size: 12px;
        }

        .label {
            color: #94a3b8;
        }

        .value {
            color: #334155;
            font-weight: 600;
            text-align: right;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .active {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .returned {
            background: #dcfce7;
            color: #15803d;
        }

        .overdue {
            background: #fee2e2;
            color: #b91c1c;
        }

        .action-area {
            margin-top: 17px;
        }

        .edit-btn {
            width: 100%;
            display: block;
            border: none;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 11px 15px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            margin-bottom: 8px;
        }

        .edit-btn:hover {
            background: #bfdbfe;
        }

        .return-btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: #ffffff;
            padding: 11px 15px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .return-btn:hover {
            background: #1d4ed8;
        }

        .pagination-wrapper {
            margin-top: 28px;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
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

        .pagination-wrapper a:hover {
            background: #2563eb;
            color: #ffffff;
        }

        .pagination-wrapper span[aria-current="page"] {
            background: #2563eb;
            color: #ffffff;
            border-color: #2563eb;
        }

        .browse-btn {
            display: inline-block;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
        }

        .browse-btn:hover {
            background: #1d4ed8;
        }

        @media (max-width: 1100px) {

            .loans-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .loans-grid {
                grid-template-columns: 1fr;
            }

            .page-header-content {
                align-items: flex-start;
                flex-direction: column;
            }

            .add-btn {
                width: 100%;
                text-align: center;
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
            Library Menu
        </div>


        <ul class="menu">

            <li>

                <a href="{{ route('dashboard') }}">

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

                <a href="{{ route('authors.index') }}">

                    <span class="menu-icon">
                        ✍️
                    </span>

                    <span>
                        Authors
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('categories.index') }}">

                    <span class="menu-icon">
                        🏷️
                    </span>

                    <span>
                        Categories
                    </span>

                </a>

            </li>


            <li>

                <a
                    href="{{ route('loans.index') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        🔄
                    </span>

                    <span>
                        Loans
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('reviews.index') }}">

                    <span class="menu-icon">
                        ⭐
                    </span>

                    <span>
                        Reviews
                    </span>

                </a>

            </li>


            @if(auth()->user()->role === 'admin')

                <li>

                    <a href="{{ route('users.index') }}">

                        <span class="menu-icon">
                            👥
                        </span>

                        <span>
                            Users
                        </span>

                    </a>

                </li>

            @endif

        </ul>


        <div class="logout">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

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

        </div>

    </aside>


    <main class="main">


        <div class="top">

            <div>

                <h1>
                    Loans
                </h1>

                <p>
                    View and manage library loans
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

            <div class="page-header-content">

                <div>

                    <h2>
                        Library Loans 🔄
                    </h2>

                    <p>
                        Track borrowed, returned and overdue books.
                    </p>

                </div>


                @can('create', App\Models\Loan::class)

                    <a
                        href="{{ route('loans.create') }}"
                        class="add-btn"
                    >
                        + Add Loan
                    </a>

                @endcan

            </div>

        </div>


        @if(session('success'))

            <div class="message success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="message error">
                {{ session('error') }}
            </div>

        @endif


        @if($loans->count() > 0)


            <div class="loans-grid">


                @foreach($loans as $loan)


                    <div class="loan-card">

                        <div class="loan-icon">
                            📖
                        </div>


                        <h3 class="loan-title">

                            {{ $loan->book->title }}

                        </h3>


                        <div class="loan-info">


                            <div class="info-row">

                                <span class="label">
                                    Author
                                </span>

                                <span class="value">

                                    {{ $loan->book->author->name ?? 'Unknown' }}

                                </span>

                            </div>


                            @if(auth()->user()->role !== 'member')

                                <div class="info-row">

                                    <span class="label">
                                        Member
                                    </span>

                                    <span class="value">

                                        {{ $loan->user->name ?? 'Unknown' }}

                                    </span>

                                </div>

                            @endif


                            <div class="info-row">

                                <span class="label">
                                    Borrowed
                                </span>

                                <span class="value">

                                    {{ $loan->borrowed_at->format('d M Y') }}

                                </span>

                            </div>


                            <div class="info-row">

                                <span class="label">
                                    Due Date
                                </span>

                                <span class="value">

                                    {{ $loan->due_at->format('d M Y') }}

                                </span>

                            </div>


                            @if($loan->returned_at)

                                <div class="info-row">

                                    <span class="label">
                                        Returned
                                    </span>

                                    <span class="value">

                                        {{ $loan->returned_at->format('d M Y') }}

                                    </span>

                                </div>

                            @endif


                            <div class="info-row">

                                <span class="label">
                                    Status
                                </span>

                                <span class="value">


                                    @if($loan->returned_at)

                                        <span class="status returned">
                                            Returned
                                        </span>

                                    @elseif($loan->due_at->isPast())

                                        <span class="status overdue">
                                            Overdue
                                        </span>

                                    @else

                                        <span class="status active">
                                            Borrowed
                                        </span>

                                    @endif


                                </span>

                            </div>


                        </div>


                        {{-- Admin / Librarian Edit --}}
                        @can('update', $loan)

                            <div class="action-area">

                                <a
                                    href="{{ route('loans.edit', $loan) }}"
                                    class="edit-btn"
                                >
                                    Edit Loan
                                </a>

                            </div>

                        @endcan


                        {{-- Return Book --}}
                        @if(!$loan->returned_at)

                            @can('returnBook', $loan)

                                <div
                                    class="action-area"
                                    style="margin-top: 8px;"
                                >

                                    <form
                                        action="{{ route('loans.return', $loan) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="return-btn"
                                        >
                                            Return Book
                                        </button>

                                    </form>

                                </div>

                            @endcan

                        @endif


                    </div>


                @endforeach


            </div>


            <div class="pagination-wrapper">

                {{ $loans->links() }}

            </div>


        @else


            <div class="loan-card">

                <div class="loan-icon">
                    📚
                </div>

                <h3 class="loan-title">
                    No Loans Yet
                </h3>

                <p
                    style="
                        font-size:13px;
                        color:#64748b;
                        margin-bottom:15px;
                    "
                >
                    No loan records are available.
                </p>

                @can('create', App\Models\Loan::class)

                    <a
                        href="{{ route('loans.create') }}"
                        class="browse-btn"
                    >
                        + Add Loan
                    </a>

                @else

                    <a
                        href="{{ route('books.index') }}"
                        class="browse-btn"
                    >
                        Browse Books
                    </a>

                @endcan

            </div>

        @endif


    </main>


</body>

</html>
