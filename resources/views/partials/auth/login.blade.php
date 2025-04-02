<div class="dashboard">
<h2>Login</h2>
    <div class="form-container">
    <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="text">Username:</label>
                <input type="text" name="login" placeholder="Email or Username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">Login</button>

        </form>
        <div> <strong><a href="{{ route('register') }}">Don't have an account yet? Register here.</a></strong></div>


        <div class="form-group">
    @if($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif
    </div>
    </div>
   
 
</div>






