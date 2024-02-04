<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Logged Out Successfully</h1>
        <p>You have been logged out.</p>
        <a class="button" href="{{ route('login') }}">Login again!</a>
    </div>
</body>
</html>