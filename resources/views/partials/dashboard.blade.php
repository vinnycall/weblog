
    <div class="dashboard">
    <h2>Welcome {{ $user->name }}!</h2>
    
    <p>Email: {{ $user->email }}</p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    
    </div>
    
