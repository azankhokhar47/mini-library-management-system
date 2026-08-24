<h1>Loans</h1>

@foreach($loans as $loan)
    <p>
        {{ $loan->user->name }}
        borrowed
        {{ $loan->book->title }}
    </p>
@endforeach
