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
            <button type="submit">Create</button>
    </form>
</div>
</div>