<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <h2>Weblog Posts</h2>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('post.show', $post->id) }}">
                    <strong>{{ $post ->title}}</strong>
                </a><br>

                <em>{{ $post->created_at->format('d-m-Y') }}</em>
            </li>
        @endforeach
    </ul>
</body>
</html>