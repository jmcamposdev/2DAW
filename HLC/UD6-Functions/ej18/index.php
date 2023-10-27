<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Decimal to Binary</title>
</head>

<body>
  <h1>Decimal to Binary</h1>
  <form action="<?php $_SERVER["PHP_SELF"] ?>">
    <label for="decimal">Decimal:</label>
    <input type="number" name="decimal" id="decimal" required>
    <input type="submit" value="Convertir">
  </form>
  <?php
  if (isset($_GET["decimal"])) {
    include_once "../ej01-14/globalFunctions.php";
    $decimal = intval($_GET["decimal"]);
    $binary = decimalToBinary($decimal);
    echo "<p>$decimal en binario es $binary</p>";
  }
  ?>
</body>

</html>