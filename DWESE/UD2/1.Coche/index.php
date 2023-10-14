<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="wrapper">
    <h1 class="title">Login</h1>
    <hr>
    <form action="index.php" method="post" class="form-style-5">
      <label for="username">Username:
        <input type="text" name="username" id="username" required>
      </label>
      <label for="password">Password:
        <input type="password" name="password" id="password" required>
      </label>
      <input type="submit" value="Login" name="submit-login">
    </form>

    <?php
    include_once("credenciales.php");

    if (isset($_POST["submit-login"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;

      if ($username == USERNAME && $password == PASSWORD) {
        header("Location: configurador.php");
      } else {
        echo "<p>Usuario o contraseña incorrectos</p>";
      }
    }
    ?>
  </section>
</body>

</html>