<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <h3><em>{{ $post->user ? $post->user->name : "Unknown User" }}</em></h3>
    <p><em>{{ $post->created_at->format('d-m-Y') }}</em></p>
    <p>{{ $post->body }}</p>

    <a href="{{ url('/') }}">Terug naar overzicht</a>
</body>
</html>
