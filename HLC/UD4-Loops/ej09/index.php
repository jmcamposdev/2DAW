<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 9</title>
</head>

<body>
  <h1>Dígitos de un número</h1>
  <form action="index.php" method="post">
    <label for="num">Introduce un número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
  </form>

  <?php
  /*
    * Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado.
    */
  if (isset($_POST["num"]) && is_numeric($_POST["num"])) {
    echo "El número " . $_POST['num'] . " tiene " . calcDigits($_POST["num"]) . " dígitos";
  }

  // Podemos calcular la longitud usando "strlen" pero no la uso para practicas los bucles
  function calcDigits($number) {
    if (!is_numeric($number)) {
      return null;
    }

    $digitLength = 1;
    while($number >= 10) {
      $number /= 10;
      $digitLength++;
    }
    return $digitLength;
  }

  ?>
</body>

</html>