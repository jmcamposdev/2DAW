<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <h1>Login</h1>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Login">
    </form>
    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif
    </div>
</body>
</html>
