<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>

    @if(session('username'))
        <p>Hello, {{ session('username') }}!</p>
        <!-- Aquí puedes mostrar contenido específico para usuarios logueados -->
        <p>This is your dashboard content.</p>
        <a href="{{ url('/logout') }}">Logout</a>
    @else
        <p>You are not logged in.</p>
        <a href="{{ url('/') }}">Login</a>
    @endif
</body>
</html>