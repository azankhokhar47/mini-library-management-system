<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f5f9ff;
            color: #1e293b;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #1d4ed8;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .field {
            margin-bottom: 15px;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .update {
            background: #2563eb;
            color: white;
        }

        .update:hover {
            background: #1d4ed8;
        }

        .back {
            background: #e2e8f0;
            color: #334155;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Review</h1>

        <form action="{{ route('reviews.update', $review) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="field">
                <label for="book_id">Book</label>

                <select name="book_id" id="book_id" required>
                    <option value="">Select Book</option>

                    @foreach($books as $book)
                        <option value="{{ $book->id }}"
                            {{ old('book_id', $review->book_id) == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>

                @error('book_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="rating">Rating</label>

                <select name="rating" id="rating" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}"
                            {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                            {{ $i }}/5
                        </option>
                    @endfor
                </select>

                @error('rating')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="comment">Comment</label>

                <textarea
                    name="comment"
                    id="comment"
                    placeholder="Write your review..."
                >{{ old('comment', $review->comment) }}</textarea>

                @error('comment')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">

                <button type="submit" class="btn update">
                    Update Review
                </button>

                <a href="{{ route('reviews.index') }}" class="btn back">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
