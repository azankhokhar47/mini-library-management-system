
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>

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
            margin: 60px auto;
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

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            margin-bottom: 15px;
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

        <h1>Edit Category</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST">

            @csrf
            @method('PUT')

            <label for="name">Category Name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
                placeholder="Enter category name"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="buttons">

                <button type="submit" class="btn update">
                    Update Category
                </button>

                <a href="{{ route('categories.index') }}" class="btn back">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
