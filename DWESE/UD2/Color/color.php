<?php
// Si se envían datos desde el formulario de actores,
// se actualizan las cookies
$color = "white";
if (isset($_POST["color"])) {
  $color = $_POST["color"];
  setcookie("color", $color, time() + 3 * 24 * 3600);
} else if (isset($_COOKIE["color"])) {
  $color = $_COOKIE["color"];
}

//setcookie("color", "", time()-3600);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
    body {
      background-color: <?php echo $color ?>;
    }
  </style>
</head>

<body>
  <?php
  ?>
  <p>Escribe un color:</p>
  <form action="#" method="post">
  Color: <input type="text" name="color"><br> <input type="submit" value="Aceptar">
  </form>
  <hr>
</body>

</html>