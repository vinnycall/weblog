<h1>Register</h1>
<div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Firstname" required>
    <input type="email" name="email" placeholder="yourname@mail.com" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
    <button type="submit">Register</button>
</form>

<a href="{{ route('login') }}">Already have an account? Login here </a>