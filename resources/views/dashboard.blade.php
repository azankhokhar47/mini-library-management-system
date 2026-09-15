<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LibraryHub Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f9ff;
            color: #1e293b;
        }

        /* Navbar */
        .navbar {
            background: #2563eb;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 24px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .role {
            background: white;
            color: #2563eb;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .logout-btn {
            background: #1d4ed8;
            color: white;
            border: 1px solid white;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #1e40af;
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        /* Welcome */
        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            color: #1d4ed8;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #64748b;
        }

        /* Statistics */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #dbeafe;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
        }

        .card h3 {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .number {
            color: #2563eb;
            font-size: 30px;
            font-weight: bold;
        }

        /* Tables */
        .tables {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 35px;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #dbeafe;
        }

        .section h2 {
            color: #1d4ed8;
            margin-bottom: 20px;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 14px;
        }

        td {
            color: #475569;
            font-size: 14px;
        }

        /* Operations */
        .operations-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #dbeafe;
            margin-bottom: 35px;
        }

        .operations-section h2 {
            color: #1d4ed8;
            margin-bottom: 8px;
            font-size: 20px;
        }

        .operations-section p {
            color: #64748b;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .resource-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .resource-section:last-child {
            border-bottom: none;
        }

        .resource-title {
            color: #334155;
            font-size: 16px;
            font-weight: bold;
        }

        .operation-btn {
            display: inline-block;
            min-width: 130px;
            text-align: center;
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .operation-btn:hover {
            background: #1d4ed8;
        }

        /* Empty */
        .empty {
            text-align: center;
            color: #94a3b8;
            padding: 15px;
        }

        /* Responsive */
        @media (max-width: 900px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .tables {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 15px 20px;
            }

            .user-area {
                gap: 8px;
            }

            .user-area > span:first-child {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 0 15px;
            }

            .resource-section {
                flex-direction: column;
                align-items: stretch;
            }

            .operation-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">

        <h2>LibraryHub</h2>

        <div class="user-area">

            <span>
                {{ $user->name }}
            </span>

            <span class="role">
                {{ $user->role }}
            </span>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>

            </form>

        </div>

    </div>


    <div class="container">

        <!-- Welcome -->
        <div class="welcome">

            <h1>Dashboard</h1>

            <p>
                Welcome back, {{ $user->name }}.
            </p>

        </div>


        <!-- Dashboard Statistics -->
        <div class="stats">

            <!-- Total Books -->
            <div class="card">

                <h3>
                    Total Books
                </h3>

                <div class="number">
                    {{ $data['totalBooks'] }}
                </div>

            </div>


            <!-- Total Members -->
            <div class="card">

                <h3>
                    Total Members
                </h3>

                <div class="number">
                    {{ $data['totalMembers'] }}
                </div>

            </div>


            <!-- Currently Borrowed -->
            <div class="card">

                <h3>
                    Books Currently Borrowed
                </h3>

                <div class="number">
                    {{ $data['currentlyBorrowed'] }}
                </div>

            </div>


            <!-- Overdue Loans -->
            <div class="card">

                <h3>
                    Overdue Loans
                </h3>

                <div class="number">
                    {{ $data['overdueLoans'] }}
                </div>

            </div>

        </div>


        <!-- Top Books -->
        <div class="tables">

            <!-- Top 5 Most Borrowed -->
            <div class="section">

                <h2>
                    Top 5 Most Borrowed Books
                </h2>

                <table>

                    <thead>

                        <tr>
                            <th>Book</th>
                            <th>Borrowed</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data['topBorrowedBooks'] as $book)

                            <tr>

                                <td>
                                    {{ $book->title }}
                                </td>

                                <td>
                                    {{ $book->loans_count }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="2" class="empty">
                                    No books found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Top 5 Highest Rated -->
            <div class="section">

                <h2>
                    Top 5 Highest Rated Books
                </h2>

                <table>

                    <thead>

                        <tr>
                            <th>Book</th>
                            <th>Rating</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data['topRatedBooks'] as $book)

                            <tr>

                                <td>
                                    {{ $book->title }}
                                </td>

                                <td>
                                    {{ number_format($book->reviews_avg_rating ?? 0, 1) }}
                                    / 5
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="2" class="empty">
                                    No ratings found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- Available Operations -->
        <div class="operations-section">

            <h2>
                Available Operations
            </h2>

            <p>
                Access the library sections available according to your role and permissions.
            </p>


            {{-- Books --}}
            @can('viewAny', App\Models\Book::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Books
                    </div>

                    <a href="{{ route('books.index') }}"
                       class="operation-btn">
                        View Books
                    </a>

                </div>

            @endcan


            {{-- Authors --}}
            @can('viewAny', App\Models\Author::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Authors
                    </div>

                    <a href="{{ route('authors.index') }}"
                       class="operation-btn">
                        View Authors
                    </a>

                </div>

            @endcan


            {{-- Categories --}}
            @can('viewAny', App\Models\Category::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Categories
                    </div>

                    <a href="{{ route('categories.index') }}"
                       class="operation-btn">
                        View Categories
                    </a>

                </div>

            @endcan


            {{-- Loans --}}
            @can('viewAny', App\Models\Loan::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Loans
                    </div>

                    <a href="{{ route('loans.index') }}"
                       class="operation-btn">

                        @if($user->role === 'member')
                            My Loans
                        @else
                            View Loans
                        @endif

                    </a>

                </div>

            @endcan


            {{-- Reviews --}}
            @can('create', App\Models\Review::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Reviews
                    </div>

                    <a href="{{ route('reviews.index') }}"
                       class="operation-btn">
                        View Reviews
                    </a>

                </div>

            @endcan


            {{-- Users - Admin only --}}
            @can('viewAny', App\Models\User::class)

                <div class="resource-section">

                    <div class="resource-title">
                        Users
                    </div>

                    <a href="{{ route('users.index') }}"
                       class="operation-btn">
                        View Users
                    </a>

                </div>

            @endcan

        </div>

    </div>

</body>
</html>
