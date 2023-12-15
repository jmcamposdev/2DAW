<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>

    <p>Hello, {{ session('username') }}!</p>
    <!-- Aquí puedes mostrar contenido específico para usuarios logueados -->
    <p>This is your dashboard content.</p>
    <a href="{{ url('/logout') }}">Logout</a>
</body>
</html>