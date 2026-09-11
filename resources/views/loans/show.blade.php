
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Details</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f9ff;
            color: #1e293b;
        }

        .container {
            width: 90%;
            max-width: 700px;
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

        .detail {
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .label {
            font-weight: bold;
            color: #475569;
        }

        .value {
            color: #1e293b;
            text-align: right;
        }

        .status {
            color: #16a34a;
            font-weight: bold;
        }

        .pending {
            color: #dc2626;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Loan Details</h1>

        <div class="detail">
            <span class="label">Member</span>
            <span class="value">
                {{ $loan->user->name ?? 'N/A' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Email</span>
            <span class="value">
                {{ $loan->user->email ?? 'N/A' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Book</span>
            <span class="value">
                {{ $loan->book->title ?? 'N/A' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Borrowed At</span>
            <span class="value">
                {{ $loan->borrowed_at ? $loan->borrowed_at->format('d M Y') : 'N/A' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Due At</span>
            <span class="value">
                {{ $loan->due_at ? $loan->due_at->format('d M Y') : 'N/A' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Returned At</span>
            <span class="value">
                {{ $loan->returned_at ? $loan->returned_at->format('d M Y') : 'Not Returned' }}
            </span>
        </div>

        <div class="detail">
            <span class="label">Status</span>

            @if($loan->returned_at)
                <span class="status">Returned</span>
            @else
                <span class="pending">Active</span>
            @endif
        </div>

        <a href="{{ route('loans.index') }}" class="btn">
            ← Back to Loans
        </a>

    </div>

</div>

</body>
</html>
