<div class="dashboard">
<h1>Edit Post</h1>

    <div class="form-container">

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="title">Titel:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="body">Inhoud:</label>
            <textarea id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="categories[]" id="category" multiple required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_premium">Mark as premium:</label>
            <input type="checkbox" name="is_premium" value="1"></input>
        </div>
        <a href="{{route ('categories') }}">Add Category</a>
        <button type="submit">Opslaan</button>
    </form>
    </div>
</div>
   