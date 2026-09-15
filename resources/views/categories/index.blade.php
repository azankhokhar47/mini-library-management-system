<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories | Mini Library</title>

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

        /* SIDEBAR */

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

        /* LOGOUT */

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

        /* MAIN */

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

        /* HEADER */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .page-header h2 {
            font-size: 22px;
            color: #172554;
        }

        .page-header p {
            font-size: 13px;
            color: #64748b;
            margin-top: 5px;
        }

        /* BUTTONS */

        .btn {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .edit {
            background: #0ea5e9;
        }

        .edit:hover {
            background: #0284c7;
        }

        .delete {
            background: #dc2626;
        }

        .delete:hover {
            background: #b91c1c;
        }

        /* MESSAGES */

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid #bbf7d0;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid #fecaca;
        }

        /* TABLE */

        .table-box {
            background: white;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, .06);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 13px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
        }

        tr:hover {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

        .no-action {
            color: #94a3b8;
            font-size: 12px;
        }

        .pagination {
            margin-top: 22px;
            display: flex;
            justify-content: center;
        }

        /* RESPONSIVE */

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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-box {
                overflow-x: auto;
            }

            table {
                min-width: 650px;
            }

        }

    </style>

</head>


<body>


    <!-- SIDEBAR -->

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

                <a
                    href="{{ route('categories.index') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        🏷️
                    </span>

                    <span>
                        Categories
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


        <!-- LOGOUT -->

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


    <!-- MAIN -->

    <main class="main">


        <div class="top">

            <div>

                <h1>
                    Categories
                </h1>

                <p>
                    Manage and view library categories
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


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h2>
                    Categories
                </h2>

                <p>
                    View categories and the number of books associated with each category.
                </p>

            </div>


            @can('create', App\Models\Category::class)

                <a
                    href="{{ route('categories.create') }}"
                    class="btn"
                >
                    + Add Category
                </a>

            @endcan

        </div>


        <!-- SUCCESS -->

        @if(session('success'))

            <div class="message">

                {{ session('success') }}

            </div>

        @endif


        <!-- ERROR -->

        @if(session('error'))

            <div class="error-message">

                {{ session('error') }}

            </div>

        @endif


        <!-- TABLE -->

        <div class="table-box">

            <table>

                <thead>

                    <tr>

                        <th>
                            #
                        </th>

                        <th>
                            Name
                        </th>

                        <th>
                            Books
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>
                                {{ $categories->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $category->name }}
                            </td>

                            <td>
                                {{ $category->books_count }}
                            </td>

                            <td>

                                <div class="actions">


                                    @can('update', $category)

                                        <a
                                            href="{{ route('categories.edit', $category) }}"
                                            class="btn edit"
                                        >
                                            Edit
                                        </a>

                                    @endcan


                                    @can('delete', $category)

                                        <form
                                            action="{{ route('categories.destroy', $category) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn delete"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    @endcan


                                    @cannot('update', $category)

                                        @cannot('delete', $category)

                                            <span class="no-action">
                                                View Only
                                            </span>

                                        @endcannot

                                    @endcannot


                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="empty"
                            >
                                No categories found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->

        <div class="pagination">

            {{ $categories->links() }}

        </div>


    </main>


</body>

</html>
