<br>
<br>
<br>
<br>
<br>
<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <label for="body">Description</label>
    <div>
        <input type="text" name="title" placeholder="Post title">
        <textarea id="body" name="body"></textarea>
    </div>

        <button type="submit">Create</button>

</form>