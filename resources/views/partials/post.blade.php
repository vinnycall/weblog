<div class="load-post">
        <div class="post">
            <div class="post-t" id="post-title-{{ $post->id }}"><h1>{{ $post->title }}</h1></div>
            <h3><em>Posted by: {{ $post->user ? $post->user->name : "Unknown User" }}</em></h3>
            <div> 
                @if($image)
                   <img src="{{ asset('uploads/' . $post->image_path) }}" alt="Uploaded Image">
              </div>
              @endif
            <div class="post-p" id="post-body-{{ $post->id }}">{{ $post->body }}</div>
    <ul>
        <h2>Categories:<h2>
       
        @foreach($post->categories as $category)
            {{ $category->name }} |
        @endforeach

        <div id="Is_premium">
            @if($post->is_premium === 1)
                <h3><strong>Premium = true</strong></h3>
            @else
                <h3><strong>Premium = false</strong></h3>
            @endif
        </div>
        
    </ul>
            @if(Auth::check() && Auth::id() === $post->user_id)
            <div class="auth-user">
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
            </div>
            @endif
        </div>
        <div class="date-created">
            <p><em>{{ $post->created_at->format('d-m-Y') }}</em></p>
        </div>
            <a href="{{ url('/') }}">Terug naar overzicht</a>








            
</div>


<div class="comments">
    <h3>Reacties</h3>
    @foreach ($post->comments as $comment)
        <div class="comment">
            <p><strong>{{ $comment->user->name }}</strong> zei op {{ $comment->created_at->format('d-m-Y') }}:</p>
            <p>{{ $comment->body }}</p>
        </div>
    @endforeach
</div>

@foreach ($post->comments as $comment)
    <div class="comment">
        <p><strong>{{ $comment->user->name }}</strong></p>
        <p contenteditable="false" id="comment-body-{{ $comment->id }}">{{ $comment->body }}</p>
        <div class="auth-user">
        <div class="buttons">
        @if(Auth::check() && Auth::id() === $comment->user_id)
            <button>Bewerken</button>
            <button>Opslaan</button>
            <button>Delete</button>
        @endif
        </div>
        </div>
    </div>
@endforeach

@if(Auth::check())
    <form action="{{ route('comment.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="body" rows="3" required placeholder="Plaats een reactie..."></textarea>
        <button type="submit">Verstuur</button>
    </form>
@else
    <p><a href="{{ route('login') }}">Log in</a> om een reactie te plaatsen.</p>
@endif

