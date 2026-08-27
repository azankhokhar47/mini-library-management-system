<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Reviews</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* =====================================
           BODY
        ===================================== */

        body {
            min-height: 100vh;

            background: #f4f8fc;

            color: #1e293b;

            padding: 35px;

            position: relative;
        }

        /* Soft Blue Glow */

        body::before {
            content: "";

            position: fixed;

            width: 400px;
            height: 400px;

            background: #3b82f6;

            filter: blur(160px);

            opacity: .08;

            top: -180px;
            left: -150px;

            pointer-events: none;
        }

        /* Soft Light Blue Glow */

        body::after {
            content: "";

            position: fixed;

            width: 350px;
            height: 350px;

            background: #60a5fa;

            filter: blur(160px);

            opacity: .08;

            bottom: -160px;
            right: -120px;

            pointer-events: none;
        }

        .container {
            max-width: 1100px;

            margin: auto;

            position: relative;

            z-index: 2;
        }

        /* =====================================
           TOP
        ===================================== */

        .top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 28px;

            color: #172554;
        }

        .top p {
            margin-top: 5px;

            font-size: 13px;

            color: #64748b;
        }

        .back {
            text-decoration: none;

            background: #2563eb;

            color: #ffffff;

            padding: 11px 18px;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;

            box-shadow:
                0 7px 18px
                rgba(37, 99, 235, .16);
        }

        .back:hover {
            background: #1d4ed8;

            transform: translateY(-2px);

            box-shadow:
                0 10px 22px
                rgba(37, 99, 235, .22);
        }

        /* =====================================
           HEADER
        ===================================== */

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
                0 12px 30px
                rgba(30, 64, 175, .08);
        }

        .page-header::after {
            content: "⭐";

            position: absolute;

            right: 40px;

            top: 5px;

            font-size: 75px;

            opacity: .12;
        }

        .page-header h2 {
            font-size: 22px;

            color: #1e3a8a;

            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13px;

            color: #475569;
        }

        /* =====================================
           MESSAGE
        ===================================== */

        .message {
            padding: 13px 16px;

            border-radius: 10px;

            margin-bottom: 18px;

            font-size: 13px;
        }

        .success {
            background: #eff6ff;

            color: #1d4ed8;

            border: 1px solid #bfdbfe;
        }

        /* =====================================
           REVIEWS
        ===================================== */

        .reviews-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }

        .review-card {
            background: #ffffff;

            border: 1px solid #dbe5f0;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .07);

            transition: .25s;
        }

        .review-card:hover {
            transform: translateY(-4px);

            border-color: #bfdbfe;

            box-shadow:
                0 14px 28px
                rgba(30, 64, 175, .12);
        }

        /* =====================================
           REVIEW TOP
        ===================================== */

        .review-top {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 15px;

            margin-bottom: 15px;
        }

        .book-name {
            font-size: 17px;

            color: #172554;

            font-weight: 700;

            line-height: 1.4;
        }

        .user-name {
            margin-top: 5px;

            font-size: 11px;

            color: #64748b;
        }

        /* =====================================
           RATING
        ===================================== */

        .rating {
            white-space: nowrap;

            background: #dbeafe;

            color: #1d4ed8;

            padding: 6px 9px;

            border-radius: 20px;

            border: 1px solid #bfdbfe;

            font-size: 11px;

            font-weight: 700;
        }

        /* =====================================
           COMMENT
        ===================================== */

        .comment {
            border-top: 1px solid #e2e8f0;

            padding-top: 14px;

            color: #475569;

            font-size: 13px;

            line-height: 1.6;

            min-height: 50px;
        }

        .date {
            margin-top: 14px;

            font-size: 10px;

            color: #94a3b8;
        }

        /* =====================================
           ACTIONS
        ===================================== */

        .actions {
            display: flex;

            gap: 8px;

            margin-top: 15px;
        }

        .edit-btn,
        .delete-btn {
            border: none;

            padding: 8px 12px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }

        /* EDIT */

        .edit-btn {
            background: #2563eb;

            color: #ffffff;

            text-decoration: none;
        }

        .edit-btn:hover {
            background: #1d4ed8;

            transform: translateY(-1px);
        }

        /* DELETE */

        .delete-btn {
            background: #fee2e2;

            color: #b91c1c;

            border: 1px solid #fecaca;
        }

        .delete-btn:hover {
            background: #fecaca;

            color: #991b1b;
        }

        /* =====================================
           EMPTY
        ===================================== */

        .empty {
            background: #ffffff;

            border: 1px solid #dbe5f0;

            border-radius: 17px;

            padding: 55px 20px;

            text-align: center;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .07);
        }

        .empty-icon {
            font-size: 45px;

            margin-bottom: 12px;
        }

        .empty h3 {
            color: #172554;

            margin-bottom: 7px;
        }

        .empty p {
            color: #64748b;

            font-size: 13px;
        }

        /* =====================================
           PAGINATION
        ===================================== */

        .pagination {
            margin-top: 28px;

            display: flex;

            justify-content: center;

            align-items: center;
        }

        .pagination nav {
            display: flex;

            justify-content: center;
        }

        /* Hide Laravel pagination text */

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;

            align-items: center;

            gap: 7px;
        }

        /* Previous / Next / Numbers */

        .pagination a,
        .pagination span {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 40px;

            height: 40px;

            padding: 0 13px;

            border-radius: 9px;

            border: 1px solid #dbe5f0;

            background: #ffffff;

            color: #475569 !important;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;

            box-shadow:
                0 3px 8px
                rgba(30, 64, 175, .05);
        }

        /* Hover */

        .pagination a:hover {
            background: #2563eb;

            border-color: #2563eb;

            color: #ffffff !important;

            transform: translateY(-1px);

            box-shadow:
                0 6px 14px
                rgba(37, 99, 235, .18);
        }

        /* Current Page */

        .pagination span[aria-current="page"] {
            background: #2563eb;

            border-color: #2563eb;

            color: #ffffff !important;

            font-weight: 700;

            box-shadow:
                0 6px 14px
                rgba(37, 99, 235, .18);
        }

        /* Disabled Previous / Next */

        .pagination span[aria-disabled="true"] {
            background: #f8fafc;

            border-color: #e2e8f0;

            color: #cbd5e1 !important;

            cursor: not-allowed;

            box-shadow: none;
        }

        /* Pagination Arrows */

        .pagination svg {
            width: 17px;

            height: 17px;
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 750px) {

            body {
                padding: 20px;
            }

            .top {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .back {
                width: 100%;

                text-align: center;
            }

            .reviews-grid {
                grid-template-columns: 1fr;
            }

            .pagination {
                overflow-x: auto;

                justify-content: flex-start;

                padding-bottom: 5px;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- =====================================
         TOP
    ====================================== -->

    <div class="top">


        <div>

            <h1>
                Library Reviews
            </h1>

            <p>
                See what members think about their favorite books
            </p>

        </div>


        <a
            href="{{ route('member.dashboard') }}"
            class="back"
        >
            ← Dashboard
        </a>


    </div>


    <!-- =====================================
         HEADER
    ====================================== -->

    <div class="page-header">

        <h2>
            Book Reviews ⭐
        </h2>

        <p>
            Explore ratings and comments from our library members.
        </p>

    </div>


    <!-- =====================================
         SUCCESS
    ====================================== -->

    @if(session('success'))

        <div class="message success">

            {{ session('success') }}

        </div>

    @endif


    <!-- =====================================
         REVIEWS
    ====================================== -->

    @if($reviews->count() > 0)


        <div class="reviews-grid">


            @foreach($reviews as $review)


                <div class="review-card">


                    <!-- REVIEW TOP -->

                    <div class="review-top">


                        <div>

                            <div class="book-name">

                                {{ $review->book->title }}

                            </div>


                            <div class="user-name">

                                Reviewed by
                                {{ $review->user->name }}

                            </div>

                        </div>


                        <!-- RATING -->

                        <div class="rating">

                            ⭐ {{ $review->rating }}/5

                        </div>


                    </div>


                    <!-- COMMENT -->

                    <div class="comment">

                        @if($review->comment)

                            {{ $review->comment }}

                        @else

                            No comment provided.

                        @endif

                    </div>


                    <!-- DATE -->

                    <div class="date">

                        {{ $review->created_at->format('d M Y') }}

                    </div>


                    <!-- ACTIONS -->

                    @if(auth()->id() === $review->user_id || auth()->user()->role === 'admin')


                        <div class="actions">


                            <!-- EDIT -->

                            @if(auth()->id() === $review->user_id)

                                <a
                                    href="{{ route('reviews.edit', $review->id) }}"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>

                            @endif


                            <!-- DELETE -->

                            <form
                                action="{{ route('reviews.destroy', $review->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this review?')"
                                >
                                    Delete
                                </button>

                            </form>


                        </div>


                    @endif


                </div>


            @endforeach


        </div>


        <!-- =====================================
             PAGINATION
        ====================================== -->

        <div class="pagination">

            {{ $reviews->links() }}

        </div>


    @else


        <!-- =====================================
             EMPTY
        ====================================== -->

        <div class="empty">


            <div class="empty-icon">
                ⭐
            </div>


            <h3>
                No Reviews Yet
            </h3>


            <p>
                There are no book reviews available at the moment.
            </p>


        </div>


    @endif


</div>


</body>

</html>
