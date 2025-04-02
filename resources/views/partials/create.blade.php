<div class="dashboard">
    <h1>Create a new post</h1>

<div class="form-container">
    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Post title">
        </div>
            
        <div class="form-group">
            <label for="body">Description:</label>
            <textarea id="body" name="body" placeholder="Write your post here"></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
<<<<<<< HEAD
            <select name="categories[]" id="category" multiple required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
=======
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
>>>>>>> parent of 03df6ef (commit)
        </div>
            <a href="{{route ('categories') }}">Add Category</a>

            <button type="submit">Create</button>
    </form>
</div>
</div>

