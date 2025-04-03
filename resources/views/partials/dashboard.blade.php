@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="dashboard">
    <h2>Welcome {{ $user->name }}!</h2>
    
    <p>Email: {{ $user->email }}</p>
    <p>Premium Status: {{ Auth::user()->is_premium ? 'Yes' : 'No' }}</p>

    <form action="{{ route('disable-premium') }}" method="POST">
        @csrf
        <button type="submit">Cancel premium</button>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    
    </div>
    
