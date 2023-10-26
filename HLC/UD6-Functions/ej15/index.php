<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primos</title>
</head>
<body>
  <h1>Primos que hay entre 1 y 1000</h1>
  <?php
    include_once '../ej01-14/globalFunctions.php';
    for ($i=1; $i <= 1000; $i++) { 
      if (esPrimo($i)) {
        echo "$i<br>";
      }
    }
    ?>
</body>
</html>