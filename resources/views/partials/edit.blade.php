    <h1>Edit Post</h1>


    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>

        <label for="body">Inhoud:</label>
        <textarea id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
        <label for="category">Categorie:</label>
        <select name="category_id" id="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('myposts') }}">Annuleren</a>
