<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" required><br><br>
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" required><br><br>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>