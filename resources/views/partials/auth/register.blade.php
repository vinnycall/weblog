<div class="dashboard">
<h1>Register</h1>
    <div class="form-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" name="name" placeholder="Username" required>
            </div>

            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="yourname@mail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
            </div>

            <button type="submit">Register</button>
        <strong><a href="{{ route('login') }}">Already have an account? Login here </a></strong>
        </form>
    </div>
    <div>
    </div>
</div>



