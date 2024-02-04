<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Login">
  </form>

  <?php
    define("USERNAME", "dwse");
    define("PASSWORD", "1234");

    // Obtenemos los datos

    if (isset($_POST["username"]) && isset($_POST["password"])) {
      if ($_POST["username"] == USERNAME && $_POST["password"] == PASSWORD) {
        echo "<p>Login correcto</p>";
      } else {
        echo "<p>Login incorrecto</p>";
      }
    }
  ?>
</body>
</html>