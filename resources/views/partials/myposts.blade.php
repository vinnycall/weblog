<div class="load-posts">
    <div class="posts">
        @foreach ($posts as $post)
            <li class="clickable-post" data-url="{{ route('post.show', $post->id) }}">
                <div id="post">
                    <a href="{{ route('post.show', $post->id) }}">
                        <strong>{{$post->title}}</strong></a><br>
                        <br>
                        <div id="post-p">{{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}</div>
                </div>
                <div class="date-created">
                <h6>Date posted: {{ $post->created_at->format('d-m-Y') }}</h6>
                </div>
                <div class="buttons">
                <form action="{{ route('post.edit', $post->id) }}" method="GET" style="display:inline;">
                    @csrf
                    @method('EDIT')
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijderen</button>
                    </form>
                </div>
            </li>
        @endforeach 
    </div>
</div>