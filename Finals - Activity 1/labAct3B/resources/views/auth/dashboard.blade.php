<h1>Welcome to your Dashboard, {{ auth()->user()->name }}!</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>