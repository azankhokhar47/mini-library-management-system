<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users - Mini Library</title>

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

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            text-align: left;
            padding: 14px 12px;
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 15px 12px;
            font-size: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .user-name {
            font-weight: bold;
            color: #172554;
        }

        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .role-admin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .role-librarian {
            background: #ede9fe;
            color: #6d28d9;
        }

        .role-member {
            background: #dcfce7;
            color: #15803d;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn {
            border: none;
            padding: 8px 13px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            display: inline-block;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-edit:hover {
            background: #bfdbfe;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .current-user {
            color: #94a3b8;
            font-size: 12px;
        }

        /* Pagination */

        .pagination-wrapper {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .pagination-info {
            color: #64748b;
            font-size: 13px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pagination nav span,
        .pagination nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            border: 1px solid #dbe2ea;
            background: white;
            color: #475569;
        }

        .pagination nav a:hover {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination nav span[aria-current="page"] {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination nav span[aria-disabled="true"] {
            color: #cbd5e1;
            background: #f8fafc;
            cursor: not-allowed;
        }

        .pagination nav a[rel="prev"],
        .pagination nav a[rel="next"] {
            padding: 0 15px;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #94a3b8;
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

            .header-row {
                gap: 15px;
            }

            .pagination nav > div:last-child {
                flex-wrap: wrap;
                justify-content: center;
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

        <div class="brand-text">
            Mini <span>Library</span>
        </div>

    </div>


    <p class="menu-title">
        Menu
    </p>


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

            <h1 class="page-title">
                Users
            </h1>

            <p class="page-description">
                Manage library users
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


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>

    @endif


    <div class="header-row">

        <div>

            <h2 style="margin: 0; font-size: 20px;">
                All Users
            </h2>

        </div>


        @can('create', App\Models\User::class)

            <a
                href="{{ route('users.create') }}"
                class="btn-add"
            >
                + Add User
            </a>

        @endcan

    </div>


    <div class="card">

        @if($users->count())

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
                            Email
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($users as $user)

                        <tr>

                            <td>
                                {{ $users->firstItem() + $loop->index }}
                            </td>


                            <td>

                                <div class="user-name">
                                    {{ $user->name }}
                                </div>

                            </td>


                            <td>
                                {{ $user->email }}
                            </td>


                            <td>

                                @if($user->role === 'admin')

                                    <span class="role role-admin">
                                        Admin
                                    </span>

                                @elseif($user->role === 'librarian')

                                    <span class="role role-librarian">
                                        Librarian
                                    </span>

                                @else

                                    <span class="role role-member">
                                        Member
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="actions">

                                    @can('update', $user)

                                        <a
                                            href="{{ route('users.edit', $user) }}"
                                            class="btn btn-edit"
                                        >
                                            Edit
                                        </a>

                                    @endcan


                                    @can('delete', $user)

                                        @if($user->id !== auth()->id())

                                            <form
                                                action="{{ route('users.destroy', $user) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-delete"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        @else

                                            <span class="current-user">
                                                Current user
                                            </span>

                                        @endif

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>


            <div class="pagination-wrapper">

                <div class="pagination-info">

                    Showing
                    {{ $users->firstItem() }}
                    to
                    {{ $users->lastItem() }}
                    of
                    {{ $users->total() }}
                    results

                </div>


                <div class="pagination">

                    {{ $users->links() }}

                </div>

            </div>


        @else

            <div class="empty">
                No users found.
            </div>

        @endif

    </div>

</main>

</body>
</html>
