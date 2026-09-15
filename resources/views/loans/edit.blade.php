<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Loan - LibraryHub</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f8fafc;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            max-width: 850px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 22px 25px;
            border-radius: 14px 14px 0 0 !important;
        }

        .card-header h3 {
            margin: 0;
            color: #1e3a8a;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control,
        .form-select {
            min-height: 45px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.15rem rgba(37, 99, 235, 0.15);
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            padding: 10px 22px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-secondary {
            padding: 10px 22px;
            border-radius: 8px;
        }

        .required {
            color: #dc2626;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .loan-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Edit Loan</h3>

            <a href="{{ route('loans.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

        <div class="card-body">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="error-box">
                    <strong>Please fix the following errors:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Loan Information --}}
            <div class="loan-info">
                <strong>Loan ID:</strong> #{{ $loan->id }}

                @if ($loan->returned_at)
                    <span class="ms-3">
                        <strong>Status:</strong> Returned
                    </span>
                @else
                    <span class="ms-3">
                        <strong>Status:</strong> Active
                    </span>
                @endif
            </div>

            <form
                action="{{ route('loans.update', $loan) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- Member --}}
                <div class="mb-4">

                    <label for="user_id" class="form-label">
                        Member <span class="required">*</span>
                    </label>

                    <select
                        name="user_id"
                        id="user_id"
                        class="form-select @error('user_id') is-invalid @enderror"
                        required
                    >

                        <option value="">Select Member</option>

                        @foreach ($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id', $loan->user_id) == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }} - {{ $user->email }}
                            </option>

                        @endforeach

                    </select>

                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Book --}}
                <div class="mb-4">

                    <label for="book_id" class="form-label">
                        Book <span class="required">*</span>
                    </label>

                    <select
                        name="book_id"
                        id="book_id"
                        class="form-select @error('book_id') is-invalid @enderror"
                        required
                    >

                        <option value="">Select Book</option>

                        @foreach ($books as $book)

                            <option
                                value="{{ $book->id }}"
                                {{ old('book_id', $loan->book_id) == $book->id ? 'selected' : '' }}
                            >
                                {{ $book->title }}
                                @if ($book->author)
                                    - {{ $book->author->name }}
                                @endif
                            </option>

                        @endforeach

                    </select>

                    @error('book_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Borrowed At --}}
                <div class="mb-4">

                    <label for="borrowed_at" class="form-label">
                        Borrowed Date <span class="required">*</span>
                    </label>

                    <input
                        type="datetime-local"
                        name="borrowed_at"
                        id="borrowed_at"
                        class="form-control @error('borrowed_at') is-invalid @enderror"
                        value="{{ old('borrowed_at', $loan->borrowed_at ? $loan->borrowed_at->format('Y-m-d\TH:i') : '') }}"
                        required
                    >

                    @error('borrowed_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Due At --}}
                <div class="mb-4">

                    <label for="due_at" class="form-label">
                        Due Date <span class="required">*</span>
                    </label>

                    <input
                        type="datetime-local"
                        name="due_at"
                        id="due_at"
                        class="form-control @error('due_at') is-invalid @enderror"
                        value="{{ old('due_at', $loan->due_at ? $loan->due_at->format('Y-m-d\TH:i') : '') }}"
                        required
                    >

                    @error('due_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Returned At --}}
                <div class="mb-4">

                    <label for="returned_at" class="form-label">
                        Returned Date
                    </label>

                    <input
                        type="datetime-local"
                        name="returned_at"
                        id="returned_at"
                        class="form-control @error('returned_at') is-invalid @enderror"
                        value="{{ old('returned_at', $loan->returned_at ? $loan->returned_at->format('Y-m-d\TH:i') : '') }}"
                    >

                    <small class="text-muted">
                        Leave empty if the book has not been returned yet.
                    </small>

                    @error('returned_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Buttons --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Loan
                    </button>

                    <a
                        href="{{ route('loans.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
