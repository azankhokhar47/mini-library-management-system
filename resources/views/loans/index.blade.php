<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | My Loans</title>

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

        body::before {
            content: "";
            position: fixed;
            width: 420px;
            height: 420px;
            background: #3b82f6;
            filter: blur(170px);
            opacity: .07;
            top: -180px;
            left: -160px;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 380px;
            height: 380px;
            background: #60a5fa;
            filter: blur(170px);
            opacity: .06;
            bottom: -180px;
            right: -150px;
            pointer-events: none;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 25px 16px;
            z-index: 10;
            box-shadow: 5px 0 25px rgba(15, 23, 42, .05);
        }


        /* =========================
           BRAND
        ========================= */

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

            background: linear-gradient(
                135deg,
                #2563eb,
                #3b82f6
            );

            color: #ffffff;
            font-size: 22px;

            box-shadow:
                0 7px 18px rgba(37, 99, 235, .20);
        }

        .brand h2 {
            font-size: 20px;
            color: #172554;
        }

        .brand h2 span {
            color: #2563eb;
        }


        /* =========================
           MENU
        ========================= */

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
                0 7px 16px rgba(37, 99, 235, .18);
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 25px;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 13px;

            color: #ef4444;
            text-decoration: none;
            border-radius: 11px;
            font-size: 14px;

            transition: .2s;
        }

        .logout:hover {
            background: #fef2f2;
            color: #dc2626;
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 235px;
            min-height: 100vh;
            padding: 30px 35px;
            position: relative;
            z-index: 2;
        }


        /* =========================
           TOP
        ========================= */

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


        /* =========================
           USER
        ========================= */

        .user {
            display: flex;
            align-items: center;
            gap: 10px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            padding: 7px 12px;

            border-radius: 30px;

            box-shadow:
                0 5px 15px rgba(15, 23, 42, .05);
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


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #eff6ff
                );

            border: 1px solid #bfdbfe;

            border-radius: 19px;

            padding: 25px 28px;

            margin-bottom: 22px;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 12px 30px rgba(37, 99, 235, .08);
        }

        .page-header::after {
            content: "🔄";

            position: absolute;

            right: 35px;
            top: 8px;

            font-size: 80px;

            opacity: .13;
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


        /* =========================
           MESSAGE
        ========================= */

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


        /* =========================
           LOAN GRID
        ========================= */

        .loans-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 18px;
        }


        /* =========================
           LOAN CARD
        ========================= */

        .loan-card {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 17px;

            padding: 20px;

            box-shadow:
                0 8px 20px rgba(15, 23, 42, .05);

            transition: .25s;
        }

        .loan-card:hover {
            transform: translateY(-4px);

            border-color: #93c5fd;

            box-shadow:
                0 14px 30px rgba(37, 99, 235, .10);
        }


        /* =========================
           LOAN ICON
        ========================= */

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

            box-shadow:
                0 5px 12px rgba(37, 99, 235, .10);
        }


        /* =========================
           LOAN TITLE
        ========================= */

        .loan-title {
            font-size: 17px;

            line-height: 1.4;

            color: #172554;

            margin-bottom: 15px;

            min-height: 48px;
        }


        /* =========================
           LOAN INFO
        ========================= */

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


        /* =========================
           STATUS
        ========================= */

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


        /* =========================
           RETURN BUTTON
        ========================= */

        .return-area {
            margin-top: 17px;
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

            transition: .2s;

            box-shadow:
                0 5px 12px rgba(37, 99, 235, .12);
        }

        .return-btn:hover {
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 7px 16px rgba(37, 99, 235, .20);
        }


        /* =========================
           PAGINATION
        ========================= */

        .pagination-wrapper {
            margin-top: 28px;

            display: flex;

            justify-content: center;
        }

        .pagination-wrapper nav {
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .pagination-wrapper nav > div {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            min-width: 38px;

            height: 38px;

            padding: 0 12px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border-radius: 9px;

            border: 1px solid #dbe3ee;

            background: #ffffff;

            color: #334155 !important;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;
        }

        .pagination-wrapper a:hover {
            background: #2563eb;

            color: #ffffff !important;

            border-color: #2563eb;

            transform: translateY(-2px);
        }

        .pagination-wrapper span[aria-current="page"] {
            background: #2563eb !important;

            color: #ffffff !important;

            border-color: #2563eb;
        }

        .pagination-wrapper span[aria-disabled="true"] {
            background: #f1f5f9 !important;

            color: #cbd5e1 !important;

            border-color: #e2e8f0;

            cursor: not-allowed;
        }

        .pagination-wrapper svg {
            width: 16px;
            height: 16px;
        }


        /* =========================
           BROWSE BUTTON
        ========================= */

        .browse-btn {
            display: inline-block;

            background: #2563eb;

            color: #ffffff;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;

            box-shadow:
                0 5px 12px rgba(37, 99, 235, .15);
        }

        .browse-btn:hover {
            background: #1d4ed8;

            transform: translateY(-1px);
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .loans-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }

        @media (max-width: 950px) {

            .main {
                padding: 25px;
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

            .loans-grid {
                grid-template-columns: 1fr;
            }

            .user div:not(.avatar) {
                display: none;
            }

        }

        @media (max-width: 450px) {

            .main {
                padding: 15px;
            }

            .top {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .user {
                align-self: flex-end;
            }

            .pagination-wrapper nav > div {
                gap: 4px;
            }

            .pagination-wrapper a,
            .pagination-wrapper span {
                min-width: 34px;

                height: 34px;

                padding: 0 8px;

                font-size: 11px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">
                📚
            </div>

            <h2>
                Mini <span>Library</span>
            </h2>

        </div>


        <!-- MENU TITLE -->

        <div class="menu-title">
            Member Menu
        </div>


        <!-- MENU -->

        <ul class="menu">


            <!-- DASHBOARD -->

            <li>

                <a href="{{ route('member.dashboard') }}">

                    <span class="menu-icon">
                        🏠
                    </span>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            <!-- BOOKS -->

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


            <!-- MY LOANS -->

            <li>

                <a
                    href="{{ route('loans.index') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        🔄
                    </span>

                    <span>
                        My Loans
                    </span>

                </a>

            </li>


            <!-- REVIEWS -->

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


            <!-- PROFILE -->

            <li>

                <a href="#">

                    <span class="menu-icon">
                        👤
                    </span>

                    <span>
                        Profile
                    </span>

                </a>

            </li>


        </ul>


        <!-- LOGOUT -->

        <a href="#" class="logout">

            <span class="menu-icon">
                🚪
            </span>

            <span>
                Logout
            </span>

        </a>


    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">


        <!-- TOP -->

        <div class="top">


            <div>

                <h1>
                    My Loans
                </h1>

                <p>
                    View and manage your borrowed books
                </p>

            </div>


            <!-- USER -->

            <div class="user">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div>

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Library Member
                    </span>

                </div>

            </div>


        </div>


        <!-- =========================
             PAGE HEADER
        ========================== -->

        <div class="page-header">

            <h2>
                Your Borrowed Books 🔄
            </h2>

            <p>
                Keep track of your borrowed and returned books.
            </p>

        </div>


        <!-- =========================
             SUCCESS MESSAGE
        ========================== -->

        @if(session('success'))

            <div class="message success">

                {{ session('success') }}

            </div>

        @endif


        <!-- =========================
             ERROR MESSAGE
        ========================== -->

        @if(session('error'))

            <div class="message error">

                {{ session('error') }}

            </div>

        @endif


        <!-- =========================
             LOANS
        ========================== -->

        @if($loans->count() > 0)


            <div class="loans-grid">


                @foreach($loans as $loan)


                    <div class="loan-card">


                        <!-- ICON -->

                        <div class="loan-icon">
                            📖
                        </div>


                        <!-- BOOK TITLE -->

                        <h3 class="loan-title">

                            {{ $loan->book->title }}

                        </h3>


                        <!-- INFORMATION -->

                        <div class="loan-info">


                            <!-- AUTHOR -->

                            <div class="info-row">

                                <span class="label">
                                    Author
                                </span>

                                <span class="value">

                                    {{ $loan->book->author->name ?? 'Unknown' }}

                                </span>

                            </div>


                            <!-- BORROWED DATE -->

                            <div class="info-row">

                                <span class="label">
                                    Borrowed
                                </span>

                                <span class="value">

                                    {{ $loan->borrowed_at->format('d M Y') }}

                                </span>

                            </div>


                            <!-- DUE DATE -->

                            <div class="info-row">

                                <span class="label">
                                    Due Date
                                </span>

                                <span class="value">

                                    {{ $loan->due_at->format('d M Y') }}

                                </span>

                            </div>


                            <!-- RETURN DATE -->

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


                            <!-- STATUS -->

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


                        <!-- RETURN -->

                        @if(!$loan->returned_at)


                            <div class="return-area">


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


                        @endif


                    </div>


                @endforeach


            </div>


            <!-- PAGINATION -->

            <div class="pagination-wrapper">

                {{ $loans->links() }}

            </div>


        @else


            <!-- =========================
                 EMPTY
            ========================== -->

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
                    You have not borrowed any books yet.
                </p>


                <a
                    href="{{ route('books.index') }}"
                    class="browse-btn"
                >
                    Browse Books
                </a>


            </div>


        @endif


    </main>


</body>

</html>
