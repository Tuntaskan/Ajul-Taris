<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

@if ($errors->any())
    <p style="color:red;">
        {{ $errors->first() }}
    </p>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf

    <label>Username</label><br>
    <input type="username" name="username"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>