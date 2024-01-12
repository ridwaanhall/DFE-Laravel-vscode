<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Stories</title>
</head>
<body>
    <h1>Search Stories</h1>

    <form action="{{ url('/search') }}" method="get">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    @if(count($stories) > 0)
        <ul>
            @foreach($stories as $story)
                <li>
                    <strong>{{ $story->title }}</strong>
                    <p>{{ $story->description }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No stories found.</p>
    @endif
</body>
</html>
