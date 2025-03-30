
    <h2>Welkom {{ $user->name }}! (Username from URL: {{ $username }})</h2>
    
    <p>Email: {{ $user->email }}</p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Uitloggen</button>
    </form>
