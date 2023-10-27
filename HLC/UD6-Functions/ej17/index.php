<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binary to Decimal</title>
</head>

<body>
  <h1>Binary to Decimal</h1>
  <form action="<?php $_SERVER["PHP_SELF"] ?>">
    <label for="decimal">Binary:</label>
    <input type="number" name="binary" id="binary" required>
    <input type="submit" value="Convertir">
  </form>
  <?php
  // Check if the form has been submitted and if is a valid binary number
  if (isset($_GET["binary"]) && preg_match("/^[01]+$/", $_GET["binary"]) ) {
    include_once "../ej01-14/globalFunctions.php";
    $binary = intval($_GET["binary"]);
    $decimal = binaryToDecimal($binary);
    echo "<p>$binary en decimal es $decimal</p>";
  } else {
    echo "<p>Introduce un número binario válido</p>"; 
  }
  ?>
</body>

</html>