
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
                @foreach($post->categories as $category)
                    {{ $category->name }}
                @endforeach

                <h6>Date posted: {{ $post->created_at->format('d-m-Y') }}</h6>
                <!-- <a class="posts-button" href="{{ route('post.show', $post->id) }}"><h5>Read more</h5></a> -->
                </div>
                
            </li>
        @endforeach 
    </div>
</div>
