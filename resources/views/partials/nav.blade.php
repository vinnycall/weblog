<div class="navbar-container">
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('post.create') }}">New Post</a></li>
            <li><a href="{{ route('myposts') }}">My Posts</a></li>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('categories') }}">Categories</a></li>


        </ul>
        
    </nav>

    <div class="loginButton">
       <a href="{{ route('login') }}">Login</a></li>
    </div>
    <div class="registerButton">
       <a href="{{ route('register') }}">Register</a></li>
    </div>
    <div class="registerButton">
       <a href="{{ route('premium') }}">Premium</a></li>
    </div>
    <div class="top-button" id="myBtn" title="Go to top">
    <h1>↑</h1>
    </div>
    
</div>