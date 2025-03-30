<div class="load-post">
        <div class="post">
            <h1>{{ $post->title }}</h1>
            <h3><em>{{ $post->user ? $post->user->name : "Unknown User" }}</em></h3>
            <div class="post-p">{{ $post->body }}</div>
        </div>
        <div class="date-created">
            <p><em>{{ $post->created_at->format('d-m-Y') }}</em></p>
        </div>
            <a href="{{ url('/') }}">Terug naar overzicht</a>
    
</div>


