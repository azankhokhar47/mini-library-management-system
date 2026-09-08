<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Book | Mini Library</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8ff;
            color: #1e293b;
            min-height: 100vh;
        }

        .container {
            max-width: 850px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.10);
            border: 1px solid #e2e8f0;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #1d4ed8;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #334155;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: #ffffff;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 12px 22px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .required {
            color: #dc2626;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px auto;
            }

            .card {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="header">
            <h1>Add New Book</h1>
            <p>Add a new book to the Mini Library collection.</p>
        </div>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            {{-- Title --}}
            <div class="form-group">
                <label for="title">
                    Book Title <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter book title"
                    required
                >

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            {{-- ISBN --}}
            <div class="form-group">
                <label for="isbn">
                    ISBN <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="isbn"
                    name="isbn"
                    value="{{ old('isbn') }}"
                    placeholder="Enter ISBN"
                    required
                >

                @error('isbn')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            {{-- Author --}}
            <div class="form-group">
                <label for="author_id">
                    Author <span class="required">*</span>
                </label>

                <select id="author_id" name="author_id" required>
                    <option value="">Select Author</option>

                    @foreach($authors as $author)
                        <option
                            value="{{ $author->id }}"
                            {{ old('author_id') == $author->id ? 'selected' : '' }}
                        >
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>

                @error('author_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            {{-- Category --}}
            <div class="form-group">
                <label for="category_id">
                    Category <span class="required">*</span>
                </label>

                <select id="category_id" name="category_id" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            {{-- Stock --}}
            <div class="form-group">
                <label for="stock">
                    Stock <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', 0) }}"
                    min="0"
                    required
                >

                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            {{-- Description --}}
            <div class="form-group">
                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter book description"
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    Add Book
                </button>

                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
