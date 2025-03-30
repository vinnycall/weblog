<h2>Inloggen</h2>
<div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Don't have an account yet? Register here.</a>