<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <form action="includes/login.inc.php" method="post">
      <h1>Login</h1>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="submitLogin" value="Login">
    </form>

    <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "wronglogin") {
          echo "<p class='error'>Wrong username or password</p>";
        }
      }
      ?>
  </div>
</body>
</html>