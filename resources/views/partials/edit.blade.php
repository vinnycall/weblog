<div class="dashboard">
<h1>Edit Post</h1>

    <div class="form-container">

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        
        <div class="form-group">
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="form-group">
        <label for="body">Inhoud:</label>
        <textarea id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
<<<<<<< HEAD
        </div>
        <div class="form-group">
        <label for="category">Categorie:</label>
        <select name="category_id" id="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        </div>
=======

>>>>>>> parent of 03df6ef (commit)
        <button type="submit">Opslaan</button>
    </form>
    </div>
    </div>
   