<div class="load-post">
        <div class="post">
            <div class="post-t" id="post-title-{{ $post->id }}"><h1>{{ $post->title }}</h1></div>
            <h3><em>{{ $post->user ? $post->user->name : "Unknown User" }}</em></h3>
            <div class="post-p" id="post-body-{{ $post->id }}">{{ $post->body }}</div>

            <div class="auth-user">
                <div class="buttons">
                    <button onclick="enableEdit({{ $post->id }})">Bewerken</button>
                    <button onclick="saveEdit({{ $post->id }})" style="display:none;" id="save-btn-{{ $post->id }}">Opslaan</button>
                    <button onclick="deletePost({{ $post->id }})" style="display:none;" id="delete-btn-{{ $post->id }}">Delete</button>
                </div>
            </div>

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
            <button onclick="enableCommentEdit({{ $comment->id }})">Bewerken</button>
            <button onclick="saveCommentEdit({{ $comment->id }})" style="display:none;" id="save-comment-btn-{{ $comment->id }}">Opslaan</button>
            <button onclick="deleteComment({{ $comment->id }})" style="display:none;" id="delete-comment-btn-{{ $comment->id }}">Delete</button>
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

