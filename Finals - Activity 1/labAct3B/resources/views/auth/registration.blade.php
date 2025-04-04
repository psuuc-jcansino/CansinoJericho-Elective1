@if ($errors->any())
<ul style="color: red; margin-bottom: 15px;">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form method="POST" action="{{ route('register.submit') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>