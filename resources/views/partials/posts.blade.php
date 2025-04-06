<div class="load-posts">
    <div class="posts">
        <!-- sorteer button hieronder -->
        <div class="sort-buttons">
            <form method="GET" action="{{ route('home') }}">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>

            </form>
        </div>

        @foreach ($posts as $post)
            <li class="clickable-post" data-url="{{ route('post.show', $post->id) }}">
                <div id="post">
                    <a href="{{ route('post.show', $post->id) }}">
                        <strong>{{$post->title}}</strong></a><br>
                    <div id="Is_premium">
                        @if($post->is_premium === 1)
                        <div id="premium">
                            <h6><strong>Premium Post</strong></h6>
                        </div>
                        @else

                        @endif
                    </div>
                    <br>
                    <div id="post-p">{{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}</div>
                </div>
                <div class="date-created">
                    @foreach($post->categories as $category)
                    {{ $category->name }}
                    @endforeach

                    <h6>Date posted: {{ $post->created_at->format('d-m-Y') }}</h6>
                </div>
            </li>
        @endforeach
    </div>
</div>