<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Converter</title>
</head>

<body>
  <h1>Full Converter</h1>
  <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <label for="type">Type</label>
    <select name="type" id="type">
      <option value="binary">Binary</option>
      <option value="decimal">Decimal</option>
      <option value="octal">Octal</option>
      <option value="hexadecimal">Hexadecimal</option>
    </select>
    <label for="number">Number</label>
    <input type="text" name="number" id="number">
    <input type="submit" name="submit" value="Convert">
  </form>
  <?php
  require_once '../ej01-14/globalFunctions.php';
  // Si se ha enviado el formulario
  if (isset($_POST['submit'])) {
    $decimal = null;
    $octal = null;
    $hexadecimal = null;
    $binary = null;
    $error = false;

    // Recogemos los datos del formulario
    $type = $_POST['type'];
    $userNumber = $_POST['number'];
    switch ($type) {
      case 'binary' : {
        if (!isBinary($userNumber)) {
          echo '<p>El número introducido no es binario</p>';
          $error = true;
          break;
        }
        $decimal = binaryToDecimal($userNumber);
        $octal = decimalToOctal($decimal);
        $hexadecimal = decimalToHexadecimal($decimal);
        $binary = $userNumber;
        break;
      }
      case 'decimal' : {
        if (!isDecimal($userNumber)) {
          echo '<p>El número introducido no es decimal</p>';
          $error = true;
          break;
        }
        $decimal = $userNumber;
        $octal = decimalToOctal($decimal);
        $hexadecimal = decimalToHexadecimal($decimal);
        $binary = decimalToBinary($decimal);
        break;
      }
      case 'octal' : {
        if (!isOctal($userNumber)) {
          echo '<p>El número introducido no es octal</p>';
          $error = true;
          break;
        }
        $decimal = octalToDecimal($userNumber);
        $octal = $userNumber;
        $hexadecimal = decimalToHexadecimal($decimal);
        $binary = decimalToBinary($decimal);
        break;
      }
      case 'hexadecimal' : {
        if (!isHexadecimal($userNumber)) {
          echo '<p>El número introducido no es hexadecimal</p>';
          $error = true;
          break;
        }
        $decimal = hexadecimalToDecimal($userNumber);
        $octal = decimalToOctal($decimal);
        $hexadecimal = $userNumber;
        $binary = decimalToBinary($decimal);
        break;
      }
      default : {
        echo '<p>El tipo de número introducido no es válido</p>';
        break;
      }
    }
    // Mostramos los resultados
    if (!$error) {
      echo '<p>Decimal: ' . $decimal . '</p>';
      echo '<p>Octal: ' . $octal . '</p>';
      echo '<p>Hexadecimal: ' . $hexadecimal . '</p>';
      echo '<p>Binario: ' . $binary . '</p>';
    }
    

  }
  ?>
</body>

</html>