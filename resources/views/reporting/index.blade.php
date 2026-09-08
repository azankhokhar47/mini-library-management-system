<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Reporting</title>

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

        /* ================================
           MAIN
        ================================= */

        .main {
            min-height: 100vh;
            padding: 30px 40px;
        }

        /* ================================
           TOP
        ================================= */

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 28px;
            color: #172554;
            margin-bottom: 6px;
        }

        .top p {
            font-size: 13px;
            color: #64748b;
        }

        .back {
            display: inline-block;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .back:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* ================================
           HEADER
        ================================= */

        .header-card {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1e40af
            );

            border-radius: 18px;

            padding: 27px 30px;

            margin-bottom: 22px;

            box-shadow:
                0 12px 30px
                rgba(37, 99, 235, .18);
        }

        .header-card h2 {
            color: white;
            font-size: 22px;
            margin-bottom: 7px;
        }

        .header-card p {
            color: #dbeafe;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ================================
           STATISTICS
        ================================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 22px;
        }

        .stat {
            background: white;

            border: 1px solid #dbe5f0;

            border-radius: 16px;

            padding: 20px;

            display: flex;
            align-items: center;

            gap: 14px;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .06);

            transition: .2s;
        }

        .stat:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 25px
                rgba(30, 64, 175, .10);
        }

        .stat-icon {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: #dbeafe;

            color: #2563eb;

            font-size: 21px;
        }

        .stat:nth-child(2) .stat-icon {
            background: #e0f2fe;
        }

        .stat:nth-child(3) .stat-icon {
            background: #dbeafe;
        }

        .stat:nth-child(4) .stat-icon {
            background: #bfdbfe;
        }

        .stat small {
            display: block;
            color: #64748b;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .stat strong {
            font-size: 23px;
            color: #172554;
        }

        /* ================================
           REPORT GRID
        ================================= */

        .reports {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background: white;

            border: 1px solid #dbe5f0;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .06);
        }

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 16px;
        }

        .card-head h3 {
            font-size: 16px;
            color: #172554;
        }

        .badge {
            background: #dbeafe;
            color: #1d4ed8;

            padding: 5px 9px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;
        }

        /* ================================
           BOOK LIST
        ================================= */

        .book {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 13px 0;

            border-bottom: 1px solid #edf2f7;
        }

        .book:last-child {
            border-bottom: none;
        }

        .book-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .book-number {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #eff6ff;
            color: #2563eb;

            font-size: 12px;
            font-weight: bold;
        }

        .book-title {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .book-author {
            font-size: 10px;
            color: #64748b;
            margin-top: 3px;
        }

        .book-count {
            font-size: 12px;
            font-weight: 600;
            color: #2563eb;
        }

        /* ================================
           RATING
        ================================= */

        .rating {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stars {
            color: #2563eb;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .rating-number {
            font-size: 12px;
            font-weight: bold;
            color: #334155;
        }

        .reviews {
            font-size: 10px;
            color: #64748b;
        }

        /* ================================
           EMPTY
        ================================= */

        .empty {
            padding: 25px 10px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .reports {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .main {
                padding: 20px;
            }

            .top {
                align-items: flex-start;
                gap: 15px;
            }

            .top h1 {
                font-size: 23px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .header-card {
                padding: 22px;
            }
        }

    </style>

</head>

<body>

    <main class="main">

        <!-- ================================
             TOP
        ================================= -->

        <div class="top">

            <div>

                <h1>
                    Library Reporting
                </h1>

                <p>
                    Eloquent aggregate reports for Mini Library
                </p>

            </div>

            <a href="{{ auth()->user()->role === 'admin'
                ? route('admin.dashboard')
                : route('librarian.dashboard') }}"
               class="back">

                ← Dashboard

            </a>

        </div>


        <!-- ================================
             HEADER
        ================================= -->

        <div class="header-card">

            <h2>
                📊 Library Statistics
            </h2>

            <p>
                View important library statistics including books,
                members, active loans, overdue loans and top performing books.
            </p>

        </div>


        <!-- ================================
             STATISTICS
        ================================= -->

        <div class="stats">

            <!-- TOTAL BOOKS -->

            <div class="stat">

                <div class="stat-icon">
                    📖
                </div>

                <div>

                    <small>
                        Total Books
                    </small>

                    <strong>
                        {{ $totalBooks }}
                    </strong>

                </div>

            </div>


            <!-- TOTAL MEMBERS -->

            <div class="stat">

                <div class="stat-icon">
                    👥
                </div>

                <div>

                    <small>
                        Total Members
                    </small>

                    <strong>
                        {{ $totalMembers }}
                    </strong>

                </div>

            </div>


            <!-- CURRENTLY BORROWED -->

            <div class="stat">

                <div class="stat-icon">
                    🔄
                </div>

                <div>

                    <small>
                        Currently Borrowed
                    </small>

                    <strong>
                        {{ $booksCurrentlyBorrowed }}
                    </strong>

                </div>

            </div>


            <!-- OVERDUE -->

            <div class="stat">

                <div class="stat-icon">
                    ⚠️
                </div>

                <div>

                    <small>
                        Overdue Loans
                    </small>

                    <strong>
                        {{ $overdueLoans }}
                    </strong>

                </div>

            </div>

        </div>


        <!-- ================================
             REPORTS
        ================================= -->

        <div class="reports">


            <!-- ================================
                 TOP BORROWED BOOKS
            ================================= -->

            <div class="card">

                <div class="card-head">

                    <h3>
                        📚 Top 5 Most Borrowed Books
                    </h3>

                    <span class="badge">
                        Loans
                    </span>

                </div>


                @forelse ($topBorrowedBooks as $index => $book)

                    <div class="book">

                        <div class="book-info">

                            <div class="book-number">
                                {{ $index + 1 }}
                            </div>

                            <div>

                                <div class="book-title">
                                    {{ $book->title }}
                                </div>

                                <div class="book-author">

                                    {{ $book->author->name ?? 'Unknown Author' }}

                                </div>

                            </div>

                        </div>

                        <div class="book-count">

                            {{ $book->loans_count }}
                            {{ $book->loans_count == 1 ? 'Loan' : 'Loans' }}

                        </div>

                    </div>

                @empty

                    <div class="empty">
                        No borrowing data available.
                    </div>

                @endforelse

            </div>


            <!-- ================================
                 TOP RATED BOOKS
            ================================= -->

            <div class="card">

                <div class="card-head">

                    <h3>
                        ⭐ Top 5 Highest Rated Books
                    </h3>

                    <span class="badge">
                        Ratings
                    </span>

                </div>


                @forelse ($topRatedBooks as $index => $book)

                    <div class="book">

                        <div class="book-info">

                            <div class="book-number">
                                {{ $index + 1 }}
                            </div>

                            <div>

                                <div class="book-title">
                                    {{ $book->title }}
                                </div>

                                <div class="book-author">

                                    {{ $book->reviews_count }}
                                    {{ $book->reviews_count == 1 ? 'Review' : 'Reviews' }}

                                </div>

                            </div>

                        </div>


                        <div class="rating">

                            <div class="stars">
                                ★
                            </div>

                            <div class="rating-number">

                                {{ number_format($book->reviews_avg_rating, 1) }}/5

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="empty">
                        No rating data available.
                    </div>

                @endforelse

            </div>


        </div>

    </main>

</body>

</html>
