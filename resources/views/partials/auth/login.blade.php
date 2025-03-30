<div class="dashboard">
<h2>Login</h2>
    <div class="form-container">
    <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">Login</button>

        </form>
        <div> <strong><a href="{{ route('register') }}">Don't have an account yet? Register here.</a></strong></div>
    </div>
</div>





