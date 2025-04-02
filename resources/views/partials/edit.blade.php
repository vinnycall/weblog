    <h1>Edit Post</h1>


    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>

        <label for="body">Inhoud:</label>
        <textarea id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('myposts') }}">Annuleren</a>
