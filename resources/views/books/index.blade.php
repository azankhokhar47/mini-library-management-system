<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>

    <h1>Library Books</h1>

    @foreach($books as $book)

        <h3>{{ $book->title }}</h3>

        <p>ISBN: {{ $book->isbn }}</p>

        <p>Author: {{ $book->author->name }}</p>

        <p>Category: {{ $book->category->name }}</p>

        <p>Stock: {{ $book->stock }}</p>

        <p>Total Loans: {{ $book->loans_count }}</p>

        <hr>

    @endforeach

    {{ $books->links() }}

</body>
</html>
