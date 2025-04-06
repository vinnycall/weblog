<div class="dashboard">
    <h1>Create a new category</h1>

    <div class="form-container">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category name:</label>
                <input type="text" name="name" placeholder="Category name">
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
    
    <h2>Category List:<h2>
            <ul>
                @foreach ($categories as $category)
                <div id="post">
                    <strong>{{$category->name}}</strong></a><br>
                </div>
                @endforeach
            </ul>
</div>