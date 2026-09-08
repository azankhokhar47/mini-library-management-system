
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mini Library | Books</title>


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
            color: #172554;
        }


        /* =========================
           BACKGROUND
        ========================= */

        body::before {
            content: "";
            position: fixed;
            width: 430px;
            height: 430px;
            background: #2563eb;
            filter: blur(180px);
            opacity: .06;
            top: -190px;
            left: -170px;
            pointer-events: none;
        }


        body::after {
            content: "";
            position: fixed;
            width: 400px;
            height: 400px;
            background: #0ea5e9;
            filter: blur(180px);
            opacity: .05;
            bottom: -190px;
            right: -170px;
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

            border-right: 1px solid #dbeafe;

            padding: 25px 16px;

            z-index: 10;

            box-shadow:
                6px 0 25px rgba(30, 64, 175, .06);
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
                #1d4ed8,
                #3b82f6
            );

            color: #ffffff;

            font-size: 22px;

            box-shadow:
                0 8px 20px rgba(37, 99, 235, .22);
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
            background: linear-gradient(
                135deg,
                #1d4ed8,
                #2563eb
            );

            color: #ffffff;

            font-weight: 600;

            box-shadow:
                0 8px 18px rgba(37, 99, 235, .20);
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

            border: 1px solid #dbeafe;

            padding: 7px 12px;

            border-radius: 30px;

            box-shadow:
                0 6px 16px rgba(30, 64, 175, .06);
        }


        .avatar {
            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #1d4ed8,
                #3b82f6
            );

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
            background: linear-gradient(
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
            content: "📚";

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
           ADD BOOK BUTTON
        ========================= */

        .add-book-btn {
            display: inline-block;

            margin-top: 16px;

            text-decoration: none;

            background: #2563eb;

            color: #ffffff;

            padding: 11px 18px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 600;

            box-shadow:
                0 6px 14px rgba(37, 99, 235, .15);

            transition: .2s;
        }


        .add-book-btn:hover {
            background: #1d4ed8;

            transform: translateY(-2px);
        }


        /* =========================
           MESSAGES
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
           FILTERS
        ========================= */

        .filters {
            background: #ffffff;

            border: 1px solid #dbeafe;

            border-radius: 16px;

            padding: 18px;

            margin-bottom: 22px;

            box-shadow:
                0 8px 22px rgba(30, 64, 175, .05);
        }


        .filter-form {
            display: grid;

            grid-template-columns:
                1.5fr
                1fr
                1fr
                auto
                auto;

            gap: 12px;

            align-items: center;
        }


        .filter-input,
        .filter-select {
            width: 100%;

            padding: 11px 13px;

            border: 1px solid #cbd5e1;

            border-radius: 9px;

            background: #ffffff;

            color: #334155;

            font-size: 13px;

            outline: none;
        }


        .filter-input:focus,
        .filter-select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, .08);
        }


        .filter-btn {
            border: none;

            background: #2563eb;

            color: #ffffff;

            padding: 11px 17px;

            border-radius: 9px;

            cursor: pointer;

            font-size: 13px;

            font-weight: 600;
        }


        .filter-btn:hover {
            background: #1d4ed8;
        }


        .clear-btn {
            text-decoration: none;

            background: #f1f5f9;

            color: #475569;

            padding: 11px 17px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 600;
        }


        .clear-btn:hover {
            background: #e2e8f0;
        }


        /* =========================
           BOOK GRID
        ========================= */

        .books-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 18px;
        }


        /* =========================
           BOOK CARD
        ========================= */

        .book-card {
            background: #ffffff;

            border: 1px solid #dbeafe;

            border-radius: 17px;

            padding: 20px;

            box-shadow:
                0 8px 22px
                rgba(30, 64, 175, .06);

            transition: .25s;

            position: relative;
        }


        .book-card:hover {
            transform: translateY(-5px);

            border-color: #93c5fd;

            box-shadow:
                0 15px 32px
                rgba(37, 99, 235, .11);
        }


        /* =========================
           BOOK ICON
        ========================= */

        .book-icon {
            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: linear-gradient(
                135deg,
                #dbeafe,
                #eff6ff
            );

            color: #2563eb;

            border-radius: 13px;

            font-size: 23px;

            margin-bottom: 15px;

            box-shadow:
                0 5px 12px
                rgba(37, 99, 235, .09);
        }


        /* =========================
           TITLE
        ========================= */

        .book-title {
            font-size: 17px;

            line-height: 1.4;

            color: #172554;

            margin-bottom: 15px;

            min-height: 48px;
        }


        /* =========================
           INFO
        ========================= */

        .book-info {
            display: flex;

            flex-direction: column;

            gap: 9px;

            padding-top: 14px;

            border-top: 1px solid #e2e8f0;
        }


        .info-row {
            display: flex;

            justify-content: space-between;

            gap: 15px;

            font-size: 12px;
        }


        .info-label {
            color: #94a3b8;
        }


        .info-value {
            color: #334155;

            font-weight: 600;

            text-align: right;
        }


        /* =========================
           STOCK
        ========================= */

        .stock {
            display: inline-block;

            padding: 5px 9px;

            border-radius: 20px;

            background: #f1f5f9;

            color: #64748b;

            font-size: 10px;

            font-weight: 600;
        }


        .stock.available {
            background: #dbeafe;

            color: #1d4ed8;
        }


        .stock.out {
            background: #fee2e2;

            color: #b91c1c;
        }


        /* =========================
           BORROW
        ========================= */

        .borrow-area {
            margin-top: 17px;
        }


        .borrow-btn {
            width: 100%;

            border: none;

            background: linear-gradient(
                135deg,
                #1d4ed8,
                #2563eb
            );

            color: #ffffff;

            padding: 11px 15px;

            border-radius: 9px;

            cursor: pointer;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;

            box-shadow:
                0 6px 14px
                rgba(37, 99, 235, .15);
        }


        .borrow-btn:hover {
            background: linear-gradient(
                135deg,
                #1e40af,
                #1d4ed8
            );

            transform: translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(37, 99, 235, .23);
        }


        .out-btn {
            width: 100%;

            border: none;

            background: #f1f5f9;

            color: #94a3b8;

            padding: 11px 15px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 600;

            cursor: not-allowed;
        }


        /* =========================
           MANAGEMENT BUTTONS
        ========================= */

        .management-area {
            display: flex;

            gap: 8px;

            margin-top: 10px;
        }


        .edit-btn,
        .delete-btn {
            flex: 1;

            border: none;

            padding: 9px 10px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            text-align: center;

            text-decoration: none;
        }


        .edit-btn {
            background: #dbeafe;

            color: #1d4ed8;
        }


        .edit-btn:hover {
            background: #bfdbfe;
        }


        .delete-btn {
            background: #fee2e2;

            color: #b91c1c;
        }


        .delete-btn:hover {
            background: #fecaca;
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

            border: 1px solid #dbeafe;

            background: #ffffff;

            color: #334155 !important;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;

            box-shadow:
                0 4px 10px
                rgba(30, 64, 175, .04);
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

            box-shadow:
                0 5px 12px
                rgba(37, 99, 235, .20);
        }


        .pagination-wrapper span[aria-disabled="true"] {
            background: #f1f5f9 !important;

            color: #cbd5e1 !important;

            border-color: #e2e8f0;

            cursor: not-allowed;

            box-shadow: none;
        }


        .pagination-wrapper svg {
            width: 16px;

            height: 16px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .books-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 950px) {

            .main {
                padding: 25px;
            }


            .books-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }


            .filter-form {
                grid-template-columns:
                    1fr 1fr;
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


            .top {
                align-items: flex-start;
            }


            .top h1 {
                font-size: 24px;
            }


            .user div:not(.avatar) {
                display: none;
            }


            .books-grid {
                grid-template-columns: 1fr;
            }


            .page-header::after {
                right: 15px;

                font-size: 60px;
            }


            .filter-form {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 450px) {

            .main {
                padding: 15px;
            }


            .top {
                flex-direction: column;

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


        <!-- =========================
             ROLE BASED MENU
        ========================== -->

        @if(auth()->user()->role === 'admin')

            <div class="menu-title">
                Admin Menu
            </div>


            <ul class="menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}">

                        <span class="menu-icon">
                            🏠
                        </span>

                        <span>
                            Dashboard
                        </span>

                    </a>
                </li>


                <li>
                    <a
                        href="{{ route('books.index') }}"
                        class="active"
                    >

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


                <li>
                    <a href="{{ route('reporting.index') }}">

                        <span class="menu-icon">
                            📊
                        </span>

                        <span>
                            Reporting
                        </span>

                    </a>
                </li>

            </ul>


        @elseif(auth()->user()->role === 'librarian')

            <div class="menu-title">
                Librarian Menu
            </div>


            <ul class="menu">

                <li>
                    <a href="{{ route('librarian.dashboard') }}">

                        <span class="menu-icon">
                            🏠
                        </span>

                        <span>
                            Dashboard
                        </span>

                    </a>
                </li>


                <li>
                    <a
                        href="{{ route('books.index') }}"
                        class="active"
                    >

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


                <li>
                    <a href="{{ route('reporting.index') }}">

                        <span class="menu-icon">
                            📊
                        </span>

                        <span>
                            Reporting
                        </span>

                    </a>
                </li>

            </ul>


        @else

            <div class="menu-title">
                Member Menu
            </div>


            <ul class="menu">

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


                <li>
                    <a
                        href="{{ route('books.index') }}"
                        class="active"
                    >

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

        @endif


        <!-- =========================
             LOGOUT
        ========================== -->

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


        <!-- =========================
             TOP
        ========================== -->

        <div class="top">

            <div>

                <h1>
                    Books
                </h1>

                <p>
                    Explore books available in Mini Library
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
                        {{ ucfirst(auth()->user()->role) }}
                    </span>

                </div>

            </div>

        </div>


        <!-- =========================
             PAGE HEADER
        ========================== -->

        <div class="page-header">

            <h2>
                Available Books 📚
            </h2>

            <p>
                Browse our collection and borrow the books you like.
            </p>


            @if(in_array(auth()->user()->role, ['admin', 'librarian']))

                <a
                    href="{{ route('books.create') }}"
                    class="add-book-btn"
                >
                    + Add New Book
                </a>

            @endif

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
             SEARCH & FILTERS
        ========================== -->

        <div class="filters">

            <form
                action="{{ route('books.index') }}"
                method="GET"
                class="filter-form"
            >


                <!-- SEARCH -->

                <input
                    type="text"
                    name="search"
                    class="filter-input"
                    placeholder="Search by title or ISBN..."
                    value="{{ request('search') }}"
                >


                <!-- CATEGORY -->

                <select
                    name="category"
                    class="filter-select"
                >

                    <option value="">
                        All Categories
                    </option>


                    @foreach($categories as $category)

                        <option
                            value="{{ $category->slug }}"
                            {{ request('category') == $category->slug ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>


                <!-- AUTHOR -->

                <select
                    name="author"
                    class="filter-select"
                >

                    <option value="">
                        All Authors
                    </option>


                    @foreach($authors as $author)

                        <option
                            value="{{ $author->id }}"
                            {{ request('author') == $author->id ? 'selected' : '' }}
                        >
                            {{ $author->name }}
                        </option>

                    @endforeach

                </select>


                <button
                    type="submit"
                    class="filter-btn"
                >
                    🔍 Search
                </button>


                <a
                    href="{{ route('books.index') }}"
                    class="clear-btn"
                >
                    Clear
                </a>

            </form>

        </div>


        <!-- =========================
             BOOKS
        ========================== -->

        @if($books->count() > 0)


            <div class="books-grid">


                @foreach($books as $book)


                    <div class="book-card">


                        <!-- BOOK ICON -->

                        <div class="book-icon">
                            📖
                        </div>


                        <!-- TITLE -->

                        <h3 class="book-title">

                            {{ $book->title }}

                        </h3>


                        <!-- BOOK INFORMATION -->

                        <div class="book-info">


                            <!-- AUTHOR -->

                            <div class="info-row">

                                <span class="info-label">
                                    Author
                                </span>

                                <span class="info-value">

                                    {{ $book->author->name ?? 'Unknown' }}

                                </span>

                            </div>


                            <!-- CATEGORY -->

                            <div class="info-row">

                                <span class="info-label">
                                    Category
                                </span>

                                <span class="info-value">

                                    {{ $book->category->name ?? 'Unknown' }}

                                </span>

                            </div>


                            <!-- ISBN -->

                            <div class="info-row">

                                <span class="info-label">
                                    ISBN
                                </span>

                                <span class="info-value">

                                    {{ $book->isbn }}

                                </span>

                            </div>


                            <!-- STOCK -->

                            <div class="info-row">

                                <span class="info-label">
                                    Available
                                </span>

                                <span class="info-value">

                                    @if($book->stock > 0)

                                        <span class="stock available">
                                            {{ $book->stock }} Available
                                        </span>

                                    @else

                                        <span class="stock out">
                                            Out of Stock
                                        </span>

                                    @endif

                                </span>

                            </div>


                            <!-- LOANS -->

                            <div class="info-row">

                                <span class="info-label">
                                    Borrowed
                                </span>

                                <span class="info-value">

                                    {{ $book->loans_count }}

                                </span>

                            </div>


                        </div>


                        <!-- =========================
                             BORROW
                        ========================== -->

                        <div class="borrow-area">


                            @if($book->stock > 0)

                                <form
                                    action="{{ route('books.borrow', $book) }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="borrow-btn"
                                    >
                                        Borrow Book
                                    </button>

                                </form>


                            @else

                                <button
                                    class="out-btn"
                                    disabled
                                >
                                    Out of Stock
                                </button>

                            @endif


                        </div>


                        <!-- =========================
                             BOOK MANAGEMENT
                        ========================== -->

                        @if(in_array(auth()->user()->role, ['admin', 'librarian']))

                            <div class="management-area">


                                <!-- EDIT -->

                                <a
                                    href="{{ route('books.edit', $book) }}"
                                    class="edit-btn"
                                >
                                    ✏️ Edit
                                </a>


                                <!-- DELETE - ADMIN ONLY -->

                                @if(auth()->user()->role === 'admin')

                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        style="flex:1;"
                                        onsubmit="return confirm('Are you sure you want to delete this book?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                            style="width:100%;"
                                        >
                                            🗑️ Delete
                                        </button>

                                    </form>

                                @endif


                            </div>

                        @endif


                    </div>


                @endforeach


            </div>


            <!-- =========================
                 PAGINATION
            ========================== -->

            <div class="pagination-wrapper">

                {{ $books->links() }}

            </div>


        @else


            <!-- =========================
                 EMPTY
            ========================== -->

            <div class="book-card">

                <div class="book-icon">
                    📚
                </div>

                <h3 class="book-title">
                    No Books Available
                </h3>

                <p style="font-size:13px;color:#64748b;">
                    There are currently no books matching your search or filters.
                </p>

            </div>


        @endif


    </main>


</body>

</html>
