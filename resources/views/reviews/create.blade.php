<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Add Review</title>

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
            padding: 35px;
        }

        .container {
            max-width: 650px;
            margin: auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            color: white;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .card {
            background: white;
            border: 1px solid #dbe5f0;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(30, 64, 175, .07);
        }

        .card h2 {
            color: #1e3a8a;
            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        select,
        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            font-size: 13px;
        }

        select:focus,
        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .submit {
            width: 100%;
            border: none;
            background: #2563eb;
            color: white;
            padding: 12px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .submit:hover {
            background: #1d4ed8;
        }

        @media (max-width: 600px) {
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
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">

        <div>
            <h1>Add Review</h1>
            <p>Share your experience about a book</p>
        </div>

        <a href="{{ route('reviews.index') }}" class="back">
            ← Reviews
        </a>

    </div>

    <div class="card">

        <h2>⭐ Write a Review</h2>

        <form action="{{ route('reviews.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Book</label>

                <select name="book_id" required>

                    <option value="">Select Book</option>

                    @foreach(\App\Models\Book::orderBy('title')->get() as $book)

                        <option value="{{ $book->id }}"
                            {{ old('book_id') == $book->id ? 'selected' : '' }}>

                            {{ $book->title }}

                        </option>

                    @endforeach

                </select>

                @error('book_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Rating</label>

                <select name="rating" required>

                    <option value="">Select Rating</option>

                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>
                        ⭐⭐⭐⭐⭐ 5/5
                    </option>

                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>
                        ⭐⭐⭐⭐ 4/5
                    </option>

                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>
                        ⭐⭐⭐ 3/5
                    </option>

                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>
                        ⭐⭐ 2/5
                    </option>

                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>
                        ⭐ 1/5
                    </option>

                </select>

                @error('rating')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Comment</label>

                <textarea
                    name="comment"
                    placeholder="Write your review..."
                >{{ old('comment') }}</textarea>

                @error('comment')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <button type="submit" class="submit">
                Add Review
            </button>

        </form>

    </div>

</div>

</body>
</html>
